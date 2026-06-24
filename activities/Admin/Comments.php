<?php

namespace Admin;

use database\Database;

class Comments extends Admin
{
    public function index()
    {
        $db = new Database();
        $comments = $db->select("SELECT comments.*,users.username,posts.title FROM comments 
        LEFT JOIN users ON comments.user_id = users.id
        LEFT JOIN posts ON comments.post_id = posts.id");
        $db->select("UPDATE comments SET status='seen' WHERE status=?", ["unseen"]);
        require_once(BASE_PATH . "/template/admin/comments/index.php");
    }
    public function changeStatus($id)
    {
        $db = new Database();
        $status = $db->select("SELECT * FROM comments WHERE id=?", [$id])[0]['status'];
        if ($status == "approved") {
            $db->update("comments", ['status' => "seen"], $id);
        } else {
            $db->update("comments", ['status' => "approved"], $id);
        }
        $this->redirect("admin/comment");
    }
    public function delete($id)
    {
        $db = new Database();
        $db->delete("DELETE FROM comments WHERE id = ?", $id);
        $this->redirect("admin/comment");
    }
}
