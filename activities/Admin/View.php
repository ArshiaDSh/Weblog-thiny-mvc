<?php

namespace Admin;

use Admin\Admin;
use database\Database;

class Views extends Admin
{
    public function index()
    {
        $db = new Database();
        $post_views =  $db->select("SELECT posts.*,COUNT(comments.post_id) AS comment_q FROM posts LEFT JOIN comments ON posts.id = comments.post_id GROUP BY comments.post_id HAVING comments.post_id IS NOT NULL UNION SELECT posts.*,comments.post_id AS comment_q FROM posts LEFT JOIN comments ON posts.id = comments.post_id WHERE comments.post_id IS NULL ORDER BY `view` DESC;");
        require_once(BASE_PATH . "/template/admin/views/index.php");
    }
}
