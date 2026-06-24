<?php

namespace App;

use database\Database;

class index
{
    protected function redirect($url)
    {
        header("Location:" . CURRENT_DOMAIN . "/" . trim($url, "/ "));
        exit;
    }
    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function notFound()
    {
        $db = new Database();
        $menus = $db->select("SELECT * FROM menus");
        $lastPosts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE `status` = 'enable' ORDER BY created_at DESC LIMIT 0,3;");
        $cats = $db->select("SELECT * FROM categories");
        $setting = $db->select("SELECT * FROM setting")[0];
        require_once(BASE_PATH . "/template/app/404.php");
        exit;
    }
    public function index()
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting")[0];
        $menus = $db->select("SELECT * FROM menus");
        $cats = $db->select("SELECT * FROM categories");
        $suggesteds = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE posts.selected = 2 ORDER BY posts.created_at DESC LIMIT 0,3; ");
        $breakingNewses =  $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE posts.breaking_news = 2 ORDER BY posts.created_at DESC;");
        $lastPosts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE `status` = 'enable' ORDER BY created_at DESC LIMIT 0,3;");
        $banners = $db->select("SELECT * FROM banners");
        $mostPopularposts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE status = 'enable' ORDER BY view DESC LIMIT 0,3;");
        $isadmin = false;
        if (isset($_SESSION['user'])) {
            if ($db->select("SELECT * FROM users WHERE id=?", [$_SESSION['user']])[0]['permission'] == "admin") {
                $isadmin = true;
            }
        }
        require_once(BASE_PATH . "/template/app/index.php");
    }
    public function show($id)
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting")[0];
        $menus = $db->select("SELECT * FROM menus");
        $cats = $db->select("SELECT * FROM categories");
        $suggesteds = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE posts.selected = 2 ORDER BY posts.created_at DESC LIMIT 0,3; ");
        $mostPopularposts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE status = 'enable' ORDER BY view DESC LIMIT 0,3;");
        $lastPosts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE `status` = 'enable' ORDER BY created_at DESC LIMIT 0,3;");
        $banners = $db->select("SELECT * FROM banners");
        $post = $db->select("SELECT * FROM posts WHERE id=? AND status = 'enable'", [$id]);
        $comments = $db->select("SELECT comments.*,(SELECT username FROM users WHERE comments.user_id  = users.id) AS username FROM comments WHERE post_id = ? AND status = 'approved'", [$id]);
        if (count($post) != 1) {
            $this->notFound();
        }
        $post = $db->select("SELECT * FROM posts WHERE id=? AND status = 'enable'", [$id])[0];
        if (isset($_SESSION['user'])) {
            $postView = $post['view'];
            $db->update("posts", ["view" => $postView + 1], $id);
        }
        require_once(BASE_PATH . "/template/app/single-page/index.php");
    }
    public function coemmentStore($vaues, $id)
    {
        if (isset($vaues['comment']) && $vaues['comment'] != "" && isset($_SESSION['user'])) {
            $db = new Database();
            $vaues['post_id'] = $id;
            $vaues['user_id'] = $_SESSION['user'];
            $db->insert("comments", $vaues);
            dd();
            $this->redirectBack();
        }
    }
    public function category($id)
    {
        $db = new Database();
        $category = $db->select("SELECT * FROM categories WHERE id = ?", [$id]);
        $setting = $db->select("SELECT * FROM setting")[0];
        $menus = $db->select("SELECT * FROM menus");
        $cats = $db->select("SELECT * FROM categories");
        $suggesteds = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE posts.selected = 2 ORDER BY posts.created_at DESC LIMIT 0,3; ");
        $mostPopularposts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE status = 'enable' ORDER BY view DESC LIMIT 0,3;");
        $lastPosts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE `status` = 'enable' ORDER BY created_at DESC LIMIT 0,3;");
        $posts = $db->select("SELECT posts.*,(SELECT name FROM categories WHERE posts.cat_id = categories.id) AS cat_name FROM posts WHERE `status` = 'enable' AND cat_id = ?", [$id]);
        if (count($category) != 1) {
            $this->notFound();
        }
        // dd($cat[0]['name']);
        require_once(BASE_PATH . "/template/app/category/index.php");
    }
}
