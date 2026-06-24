<?php

namespace Auth;

use database\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Auth
{

    protected function redirect($url)
    {
        header("Location:" . CURRENT_DOMAIN . "/" . trim($url, "/ "));
        exit;
    }
    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password): string
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }

    public function sendMail($emailAddress, $subject, $body)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = "UTF-8";                //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = MAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = SMTP_AUTH;                                   //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME;                     //SMTP username
            $mail->Password = MAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $resault = $mail->send();
            echo 'Message has been sent';
            return $resault;
        } catch (Exception $e) {
            echo "<pre>";
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    public function register()
    {
        require_once(BASE_PATH . "/template/auth/register.php");
    }
    public function store($values)
    {
        $db = new Database();
        if (!empty($values['username']) && !empty($values['password']) && !empty($values['password-confirm']) && !empty($values['email'])) {
            $validation = true;
            if (strlen($values['username']) > 40) {
                flash("username_validation", "Username must be less than 40 character");
                $validation = false;
            }
            if (strlen($values['password']) <= 8) {
                flash("password_validation", "Password must be more than 8 character");
                $validation = false;
            }
            if ($values['password'] != $values['password-confirm']) {
                flash("match_password_validation", "Password must be same");
                $validation = false;
            }
            if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
                flash("email_validation", "Email in not valid");
                $validation = false;
            }
            $email_existance = count($db->select("SELECT * FROM users WHERE email=?", [$values['email']])) == 0 ? true : false;

            if (!$email_existance) {
                flash("email_validation", "Email already exists");
                $validation = false;
            }
            if ($validation) {
                $values['password'] = $this->hash($values['password']);
                $db->insert("users", ["username" => $values['username'], "password" => $values['password'], "email" => $values['email']]);
                $_SESSION['user'] = $db->select("SELECT * FROM users WHERE email=?",[$values['email']])[0]['id'];
                $this->redirect("admin");


            } else {
                $this->redirectBack();
            }
        } else {
            $this->redirect("register");
        }
    }
    public function login()
    {
        require_once(BASE_PATH . "/template/auth/login.php");
    }
    public function loginCheck($values)
    {
        if (empty($values['email'])) {
            flash("login_email_validate", "Email is reqired");
            $this->redirect("login");
        }
        if (empty($values['password'])) {
            flash("login_password_validate", "Password is reqired");
            $this->redirect("login");
        }
        $db = new Database();
        $user_info = $db->select("SELECT * FROM users WHERE email=? AND is_active = 1", [$values['email']]);
        if ($user_info) {
            $password_validation = password_verify($values['password'], $user_info[0]['password']);
            if ($password_validation) {
                $_SESSION['user'] = $user_info[0]['id'];
                $this->redirect("admin");
            } else {
                flash("login_validate", "Emil or Password in wrong");
                $this->redirect("login");
            }
        } else {
            flash("login_validate", "Emil or Password in wrong");
            $this->redirect("login");
        }
    }
    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db =  new Database();
            $user_info = $db->select("SELECT * FROM users WHERE id=?", [$_SESSION['user']]);
            if ($user_info) {
                if ($user_info[0]['permission'] != "admin") {
                    $this->redirect("home");
                }
            } else {
                $this->redirect("home");
            }
        } else {
            $this->redirect("home");
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        $this->redirect("home");
    }
}
