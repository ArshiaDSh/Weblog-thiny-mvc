<?php

namespace Admin;

use database\Database;


class Category extends Admin
{
    public function index()
    {
        $db = new Database();
        $cats = $db->select("SELECT * FROM categories ORDER BY `id`");
        require_once(BASE_PATH . "/template/admin/categories/index.php");
    }
    public function create()
    {
        require_once(BASE_PATH . "/template/admin/categories/create.php");
    }
    public function store($request)
    {
        $db = new Database();
        if (!empty($request) && $request['cat-name'] != "") {
            $db->insert("categories", ["name" => $request['cat-name']]);
            echo "salp";
        }
        echo "salp";
        $this->redirect("admin/category");
    }
    public function edit($id)
    {
        $db = new Database();
        $cats = $db->select("SELECT * FROM categories WHERE id <> ? ORDER BY `id`", [$id]);
        $edit_cat = $db->select("SELECT * FROM categories WHERE id = ?", [$id])[0];
        require_once(BASE_PATH . "/template/admin/categories/edit.php");
    }
    public function update($valus, $id)
    {
        $db = new Database();
        $db->update("categories", ["name" => $valus['cat-name']], $id);
        $this->redirect("admin/category");
    }
    public function delete($id)
    {
        $db = new Database();
        $db->delete("DELETE FROM categories WHERE id = ?", (int) $id);
        $this->redirect("admin/category");
    }
}
