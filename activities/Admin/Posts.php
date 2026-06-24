<?php

namespace Admin;

use database\Database;

class Posts extends Admin
{
    public function index()
    {
        $db = new Database();
        $posts = $db->select("SELECT posts.*,users.username,categories.name FROM `posts` 
        LEFT JOIN users ON posts.user_id=users.id
        LEFT JOIN categories ON posts.cat_id=categories.id");
        require_once(BASE_PATH . "/template/admin/posts/index.php");
    }
    public function create()
    {
        $db = new Database();
        $cats = $db->select("SELECT * FROM `categories`");
        require_once(BASE_PATH . "/template/admin/posts/create.php");
    }
    public function store($request)
    {

        $db = new Database();
        if (
            !empty($request) && $request['cat'] != ""
            && $request["title"] != "" &&
            $request["published-at"] != "" &&
            $request["summary-text"] != "" &&
            $request["body-text"] != "" &&
            !empty($request["img"])
        ) {
            $img = $this->saveImage($request['img'], "admin/img/post-images");
            $db->insert("posts", ["title" => trim($request['title']), "cat_id" => $request['cat'], "user_id" => $_SESSION['user'], "image" => $img, "published_at" => $request['published-at'], "summary" => trim($request['summary-text']), "body" => trim($request['summary-text']) . trim($request['body-text'])]);
        }
        $this->redirect("admin/post");
    }
    public function edit($id)
    {
        $db = new Database();
        $cats = $db->select("SELECT * FROM `categories`");
        $post = $db->select("SELECT * FROM posts WHERE id = ? ORDER BY `id`", [$id])[0];
        require_once(BASE_PATH . "/template/admin/posts/edit.php");
    }
    public function update($valus, $id)
    {
        $db = new Database();
        if (
            !empty($valus) && $valus["cat"] != "" && $valus["title"] != "" &&
            $valus["published-at"] != "" &&
            $valus["summary-text"] != "" &&
            $valus["body-text"] != ""

        ) {
            $db = new Database();
            if ($valus['img']['error'] == 0) {
                $currentImgPath = $db->select("SELECT * FROM posts WHERE id=?", [$id])[0]['image'];
                $this->removeImage($currentImgPath);
                $imgPath = $this->saveImage($valus['img'], "admin/img/post-images");
                $db->update("posts", ["image" => $imgPath], $id);
            }
            $db->update("posts", ["title" => $valus['title'], "published_at" => $valus['published-at'], "summary" => trim($valus['summary-text']),  "body" => trim($valus['summary-text']) . trim($valus['body-text'])], $id);
        }
        $this->redirect("admin/post");
    }
    public function delete($id)
    {
        $db = new Database();
        $imgPath = $db->select("SELECT * FROM posts WHERE id=?", [$id])[0]['image'];
        $this->removeImage($imgPath);
        $db->delete("DELETE FROM posts WHERE id = ?", $id);
        $this->redirect("admin/post");
    }
    public function selected($id)
    {
        $db = new Database();
        $status = $db->select("SELECT * FROM posts WHERE id=?", [$id])[0]['selected'];
        if ($status == 1) {
            $db->update("posts", ['selected' => 2], $id);
        } else {
            $db->update("posts", ['selected' => 1], $id);
        }
        $this->redirect("admin/post");
    }
    public function breakingNews($id)
    {
        $db = new Database();
        $status = $db->select("SELECT * FROM posts WHERE id=?", [$id])[0]['breaking_news'];
        if ($status == 1) {
            $db->update("posts", ['breaking_news' => 2], $id);
        } else {
            $db->update("posts", ['breaking_news' => 1], $id);
        }
        $this->redirect("admin/post");
    }
    public function changeStatus($id)
    {
        $db = new Database();
        $status = $db->select("SELECT * FROM posts WHERE id=?", [$id])[0]['status'];
        if ($status == "disable") {
            $db->update("posts", ['status' => "enable"], $id);
        } else {
            $db->update("posts", ['status' => "disable"], $id);
        }
        $this->redirect("admin/post");
    }
}
