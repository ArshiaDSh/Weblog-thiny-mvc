<?php

namespace Admin;

use Auth\Auth;

class Admin
{
    function __construct()
    {
        $auth =  new Auth();
        $auth->checkAdmin();
        $this->basePath = BASE_PATH;
        $this->cueentDomain = CURRENT_DOMAIN;
    }
    protected function redirect($url)
    {
        header("Location:" . CURRENT_DOMAIN . "/" . trim($url, "/ "));
    }
    protected function redirectBack()
    {
        return CURRENT_DOMAIN . "/" . $_SERVER['HTTP_REFERER'];
    }
    protected function saveImage($image, $imagePath = "img", $imageName = null)
    {
        $extention = explode("/", $image['type'])[1];
        if ($imageName) {
            $imageName = trim($imageName) . "." . $extention;
        } else {
            $imageName = trim(date("Y-m-d-H-i-s")) . "." . $extention;
        }
        $path = "public/" . $imagePath . "/";
        if (is_uploaded_file($image['tmp_name'])) {
            if (move_uploaded_file($image['tmp_name'], $path . $imageName)) {
                return $path . $imageName;
            }
        }
    }
    protected function removeImage($path)
    {
        $path = trim($this->basePath, "/") . "/" . trim($path, "/");
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
