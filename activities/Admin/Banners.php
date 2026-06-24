<?php

namespace Admin;

use database\Database;

class Banners extends Admin
{
    public function index()
    {
        $db = new Database();
        $banners = $db->select("SELECT * FROM banners");
        require_once(BASE_PATH . "/template/admin/banners/index.php");
    }
    public function create()
    {
        require_once(BASE_PATH . "/template/admin/banners/create.php");
    }
    public function store($valus)
    {
        $db = new Database();
        if (!empty($valus)) {
            $imgPath = $this->saveImage($valus['banner-img'], "admin/img/banner-images");
            $db->insert("banners", ["url" => $valus['banner-url'], "image" => $imgPath]);
        }
        $this->redirect("admin/banner");
    }
    public function edit($id)
    {
        $db = new Database();
        $banners = $db->select("SELECT * FROM banners WHERE id <> ?", [$id]);
        $edited_banner = $db->select("SELECT * FROM banners WHERE id=?", [$id])[0];
        require_once(BASE_PATH . "/template/admin/banners/edit.php");
    }
    public function update($valus, $id)
    {
        $db = new Database();
        if (!empty($valus)) {
            if ($valus['banner-img']['error'] == 0) {
                $currenyImgPath = $db->select("SELECT * FROM banners WHERE id=?", $id)[0]['image'];
                $this->removeImage($currenyImgPath);
                $imgPath = $this->saveImage($valus['banner-img'], "admin/img/banner-images");
                $db->update("banners", ["image" => $imgPath], $id);
            }
            $db->update("banners", ["url" => $valus['banner-url']], $id);
        }
        $this->redirect("admin/banner");
    }
    public function delete($id)
    {
        $db = new Database();
        $imgPath = $db->select("SELECT * FROM banners WHERE id=?", [$id])[0]['image'];
        $this->removeImage($imgPath);
        $db->delete("DELETE FROM banners WHERE id = ?", $id);
        $this->redirect("admin/banner");
    }
}
