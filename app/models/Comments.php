<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 13.12.2017
 * Time: 18:17
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
    protected $primaryKey = "uid";
    protected $fillable = ["user_uid", "news_uid", "comment"];

    public function author()
    {
        return $this->hasOne('Models\FacebookUser', 'uid', 'user_uid');
    }
    public function news()
    {
        return $this->hasOne('Models\News', 'news_id', 'news_uid');
    }

}