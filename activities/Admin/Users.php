<?php

namespace Admin;

use database\Database;


class Users extends Admin
{
    public function index()
    {
        $db = new Database();
        $users = $db->select("SELECT * FROM users ORDER BY `id`");
        require_once(BASE_PATH . "/template/admin/users/index.php");
    }
    public function create()
    {
        require_once(BASE_PATH . "/template/admin/users/create.php");
    }
    public function store($request)
    {
        $db = new Database();
        if (!empty($request)) {
            $db->insert("users", ["username" => $request['username'], "password" => $request['password'], "email" => $request['email'], "permission " => $request['premission']]);
        }
        $this->redirect("admin/user");
    }
    public function edit($id)
    {
        $db = new Database();
        $users = $db->select("SELECT * FROM users WHERE id <> ? ORDER BY `id`", [$id]);
        $edit_user = $db->select("SELECT * FROM users WHERE id = ?", [$id])[0];
        require_once(BASE_PATH . "/template/admin/users/edit.php");
    }
    public function update($valus, $id)
    {
        $db = new Database();
        $db->update("users", ["username" => $valus['username'], "email" => $valus["email"], "permission" => $valus['permission']], $id);
        $this->redirect("admin/user");
    }
    public function delete($id)
    {
        $db = new Database();
        $db->delete("DELETE FROM users WHERE id = ?", (int) $id);
        $this->redirect("admin/user");
    }
}
