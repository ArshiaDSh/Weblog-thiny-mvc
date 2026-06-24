<?php

namespace Admin;

use database\Database;


class Menus extends Admin
{
    public function index()
    {
        $db = new Database();
        $menus = $db->select("SELECT m.*, s.name as parent_name FROM menus m LEFT JOIN menus s ON m.parent_id = s.id ORDER BY `id`");
        require_once(BASE_PATH . "/template/admin/menus/index.php");
    }
    public function create()
    {
        $db = new Database();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL ORDER BY `id`");
        require_once(BASE_PATH . "/template/admin/menus/create.php");
    }
    public function store($request)
    {
        $db = new Database();
        if (!empty($request) && $request['menu-name'] != "") {
            if ($request['parent'] != null) {
                $db->insert("menus", ["name" => $request['menu-name'], "url" => $request['menu-url'], "parent_id" => $request['parent']]);
            } else {
                $db->insert("menus", ["name" => $request['menu-name'], "url" => $request['menu-url']]);
            }
        }
        $this->redirect("admin/menu");
    }
    public function edit($id)
    {
        $db = new Database();
        $menus = $db->select("SELECT m.*, s.name as parent_name FROM menus m LEFT JOIN menus s ON m.parent_id = s.id WHERE m.id <> ? ORDER BY m.id", [$id]);
        $edit_menu = $db->select("SELECT * FROM menus WHERE id = ?", [$id])[0];
        require_once(BASE_PATH . "/template/admin/menus/edit.php");
    }
    public function update($valus, $id)
    {
        $db = new Database();
        if (!empty($valus) && $valus['menu-name'] != "") {
            if ($valus['parent'] != null) {
                $db->update("menus", ["name" => $valus['menu-name'], "url" => $valus['menu-url'], "parent_id" => $valus['parent']], $id);
            } else {
                $db->update("menus", ["name" => $valus['menu-name'], "url" => $valus['menu-url']], $id);
            }
        }
        $this->redirect("admin/menu");
    }
    public function delete($id)
    {
        $db = new Database();
        $db->delete("DELETE FROM menus WHERE id = ?", (int) $id);
        $this->redirect("admin/menu");
    }
}
