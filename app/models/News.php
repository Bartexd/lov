<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 27.11.2017
 * Time: 21:03
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table = "news";
    protected $primaryKey = "news_id";
    protected $fillable = ["user_id", "gallery_id", "title", "subtitle", "content-short", "content-long"];

    public function comments()
    {
        return $this->hasMany('Models\Comments','news_uid','news_id')->latest();
    }
    public function comments_few()
    {
        return $this->hasMany('Models\Comments','news_uid','news_id')->latest()->take(10);
    }

    public function author()
    {
        return $this->hasOne('Models\Users', 'user_id', 'user_id');
    }

    public function gallery()
    {
        return $this->hasOne('Models\Gallery', 'uid', 'gallery_id');
    }

//    public function hasGallery()
//    {
//        return $this->gallery_id == 0 ? false : true;
//    }
    public function hasCreatedGallery()
    {
        return $this->gallery()->first() != null ? true : false;
    }

    public function hasLongContent()
    {
        return $this['content-long'] != null ? true : false;
    }

}