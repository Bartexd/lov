<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 13.12.2017
 * Time: 18:55
 */

namespace Controllers;


use App\View;

class comments implements Controller
{

    public function delete($args = [])
    {
        // TODO: Implement delete() method.
    }

    public function index($args = [])
    {
        // TODO: Implement index() method.
    }

    public function get($args = [])
    {
        $news_id = $args['news_id'];
        $take = $args['take'];


        if (isset($args['skip'])) {
            $skip = $args['skip'];
            $r = \Models\Comments::query()->select("user_uid", "comment", "created_at")->where("news_uid", "=", $news_id)->skip($skip)->take($take)->get();
        } else $r = \Models\Comments::query()->select("user_uid", "comment", "created_at")->where("news_uid", "=", $news_id)->take($take)->get();



        return View::make("/parts/comments.twig", ["comments" => $r]);
    }

    public function post($args = [])
    {
        if ($_SESSION['user'] != 0) {
            $user_id = $_SESSION['user'];
            $comment = $_POST['comment'];
            $news_id = $_POST['post_id'];

            if (strlen($comment) > 255) {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=maxlength_255');
                return;
            }

            \Models\Comments::query()->insert([
                                                  'user_uid' => $user_id,
                                                  'news_uid' => $news_id,
                                                  'comment' => $comment
                                              ]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=not_logged');
        }
    }

    public function patch($args = [])
    {
        // TODO: Implement patch() method.
    }

    public function update($args = [])
    {
        // TODO: Implement update() method.
    }
}