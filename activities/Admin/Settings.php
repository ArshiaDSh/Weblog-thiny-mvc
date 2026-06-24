<?php

namespace Admin;

use database\Database;

class Settings extends Admin
{
    public function index()
    {
        $db =  new Database();
        $setting =  $db->select("SELECT * FROM setting ORDER BY id")[0];
        require_once(BASE_PATH . "/template/admin/settings/index.php");
    }
    public function edit()
    {
        $db =  new Database();
        $setting =  $db->select("SELECT * FROM setting")[0];
        require_once(BASE_PATH . "/template/admin/settings/edit.php");
    }
    public function update($valus)
    {
        // dd($valus);
        $db = new Database();
        $setting =  $db->select("SELECT * FROM setting ORDER BY id");
        if (count($setting) == 1) {
            if (!empty($valus)) {
                if ($valus['icon']['error'] == 0) {
                    $currentIconPath = $db->select("SELECT * FROM setting",)[0]['icon'];
                    $this->removeImage($currentIconPath);
                    $imgPath = $this->saveImage($valus['icon'], "admin/img/setting", "icon");
                    $db->update("setting", ["icon" => $imgPath], 1);
                }
                if ($valus['logo']['error'] == 0) {
                    $currentLogoPath = $db->select("SELECT * FROM setting",)[0]['logo'];
                    $this->removeImage($currentLogoPath);
                    $imgPath = $this->saveImage($valus['logo'], "admin/img/setting", "logo");
                    $db->update("setting", ["logo" => $imgPath], 1);
                };
                $db->update("setting", ["title" => $valus['title'], "description" => $valus['description'], "keywords" => $valus['keywords']], 1);
                // dd();
            }
        } elseif (count($setting) == 0) {
            if (!empty($valus)) {
                $iconImgPath = $this->saveImage($valus['icon'], "admin/img/setting", "icon");
                $logoImgPath = $this->saveImage($valus['logo'], "admin/img/setting", "logo");
                $db->insert("setting", ["id" => 1, "title" => $valus['title'], "description" => $valus['description'], "icon" => $iconImgPath, "logo" => $logoImgPath, "keywords" => $valus['keywords']], 1);
                // dd();
            }
        }
        $this->redirect("admin/setting");
    }
}
