<?php

namespace Admin;

use Admin\Admin;
use database\Database;

class Index extends Admin
{
    public function index()
    {
        $db = new Database();
        $posts_q = $db->select("SELECT COUNT(*) FROM posts")[0]['COUNT(*)'];
        $comments = $posts_q != 0 ? $db->select("SELECT COUNT(*) FROM comments")[0]['COUNT(*)'] / $posts_q : $db->select("SELECT COUNT(*) FROM comments")[0]['COUNT(*)'] / 1;
        $comments = floor($comments);
        $users = $db->select("SELECT COUNT(*) FROM users")[0]['COUNT(*)'];
        $views = $posts_q != 0 ? $db->select("SELECT SUM(view) FROM posts")[0]['SUM(view)'] / $posts_q : $db->select("SELECT SUM(view) FROM posts")[0]['SUM(view)'] / 1;
        $views = floor($views);
        $post_views =  $db->select("SELECT posts.*,COUNT(comments.post_id) AS comment_q FROM posts LEFT JOIN comments ON posts.id = comments.post_id GROUP BY comments.post_id ORDER BY posts.view DESC LIMIT 0,3");
        require_once(BASE_PATH . "/template/admin/index.php");
    }
}
