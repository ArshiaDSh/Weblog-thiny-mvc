<?php
//session start
session_start();
//config
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain());
define('DISPLAY_ERROR', true);
define('DB_HOST', "localhost");
define('DB_NAME', "news_website");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
//mail
define('MAIL_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME', 'ashiad.shribani@gmail.com');
define('MAIL_PASSWORD', 'hobvzbojhckydrpi');
define('MAIL_PORT', 587);
define('SENDER_MAIL', 'ashiad.shribani@gmail.com');
define('SENDER_NAME', 'فرمانده');
//admin
require_once("database/DataBase.php");
require_once("activities/Admin/Admin.php");
require_once("activities/Admin/Index.php");
require_once("activities/Admin/View.php");
require_once("activities/Admin/Category.php");
require_once("activities/Admin/Users.php");
require_once("activities/Admin/Menus.php");
require_once("activities/Admin/Banners.php");
require_once("activities/Admin/Comments.php");
require_once("activities/Admin/Posts.php");
require_once("activities/Admin/Settings.php");

//auth
require_once("activities/Auth/Auth.php");
//app
require_once("activities/App/Home.php");



function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{

    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);
    //reserved Url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($reservedUrlArray) != sizeof($currentUrlArray) || methodField() != $requestMethod) {
        return false;
    }
    $parameters = [];
    for ($key = 0; $key < count($reservedUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == "{" && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}") {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($reservedUrlArray[$key] !=  $currentUrlArray[$key]) {
            return false;
        }
    }
    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }
    $object = new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit;
}
//helpers
function protocol()
{
    return strpos($_SERVER['SERVER_PROTOCOL'], "https") ? "https://" : "http://";
}
function currentDomain()
{
    return trim(protocol()) . $_SERVER['HTTP_HOST'];
}
function asset($src)
{
    return trim(CURRENT_DOMAIN, "/ ") . "/" . trim($src, "/ ");
}
function url($url)
{
    return trim(CURRENT_DOMAIN, "/ ") . "/" . trim($url, "/ ");
}
function CurrentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}
function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}
function dispalyError(bool $display_error)
{
    if ($display_error) {
        ini_set('display_error', 1);
        ini_set('display_startup_error', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_error', 0);
        ini_set('display_startup_error', 0);
        error_reporting(0);
    }
}
function dd(...$vars)
{
    echo "<pre>";
    foreach ($vars as $var) {
        var_dump($var);
    }

    exit;
}
global $flashMessage;
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}
function flash($name, $value = null)
{
    if (is_null($value)) {
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : null;
        return $message;
    } else {
        $_SESSION['flash_message'][$name] = $value;
    }
}

//admin
uri("admin", "Admin\Index", "index");
//views
uri("admin/post-statics", "Admin\Views", "index");
//catrgory
uri("admin/category", "Admin\category", "index");
uri("admin/category/create", "Admin\category", "create");
uri("admin/category/create/store", "Admin\category", "store", "POST");
uri("admin/category/edit/{id}", "Admin\category", "edit");
uri("admin/category/update/{id}", "Admin\category", "update", "POST");
uri("admin/category/delete/{id}", "Admin\category", "delete");
//users
uri("admin/user", "Admin\users", "index");
uri("admin/user/create", "Admin\users", "create");
uri("admin/user/create/store", "Admin\users", "store", "POST");
uri("admin/user/edit/{id}", "Admin\users", "edit");
uri("admin/user/update/{id}", "Admin\users", "update", "POST");
uri("admin/user/delete/{id}", "Admin\users", "delete");
//menus
uri("admin/menu", "Admin\menus", "index");
uri("admin/menu/create", "Admin\menus", "create");
uri("admin/menu/create/store", "Admin\menus", "store", "POST");
uri("admin/menu/edit/{id}", "Admin\menus", "edit");
uri("admin/menu/update/{id}", "Admin\menus", "update", "POST");
uri("admin/menu/delete/{id}", "Admin\menus", "delete");
//banners
uri("admin/banner", "Admin\banners", "index");
uri("admin/banner/create", "Admin\banners", "create");
uri("admin/banner/create/store", "Admin\banners", "store", "POST");
uri("admin/banner/edit/{id}", "Admin\banners", "edit");
uri("admin/banner/update/{id}", "Admin\banners", "update", "POST");
uri("admin/banner/delete/{id}", "Admin\banners", "delete");
//comments
uri("admin/comment", "Admin\comments", "index");
uri("admin/comment/change-status/{id}", "Admin\comments", "changeStatus");
uri("admin/comment/delete/{id}", "Admin\comments", "delete");
//posts
uri("admin/post", "Admin\posts", "index");
uri("admin/post/create", "Admin\posts", "create");
uri("admin/post/create/store", "Admin\posts", "store", "POST");
uri("admin/post/edit/{id}", "Admin\posts", "edit");
uri("admin/post/update/{id}", "Admin\posts", "update", "POST");
uri("admin/post/delete/{id}", "Admin\posts", "delete");
uri("admin/post/selected/{id}", "Admin\posts", "selected");
uri("admin/post/breaking-news/{id}", "Admin\posts", "breakingNews");
uri("admin/post/change-status/{id}", "Admin\posts", "changeStatus");
//setting
uri("admin/setting", "Admin\settings", "index");
uri("admin/setting/edit", "Admin\settings", "edit");
uri("admin/setting/update", "Admin\settings", "update", "POST");




//auth
uri("register", "Auth\auth", "register");
uri("register/store", "Auth\auth", "store", "POST");
uri("login", "Auth\auth", "login");
uri("check-admin", "Auth\auth", "loginCheck", "POST");
uri("logout", "Auth\auth", "logout");




//app
uri("/", "App\index", "index");
uri("home", "App\index", "index");
uri("show-post/{id}", "App\index", "show");
uri("show-post/{post_id}/comment-store", "App\index", "coemmentStore", "POST");
uri("categories/{id}", "App\index", "category");

$index = new App\index();
$index->notFound();
