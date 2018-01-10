<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 28.11.2017
 * Time: 17:23
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $table = "gallery";
    protected $primaryKey = "uid";
    protected $fillable = ["thumb_url"];

    public function news()
    {
        return $this->hasOne('Models\News', 'gallery_id', 'uid');
    }
    public function photos()
    {
        return $this->hasMany('Models\Photos', 'photo_uid','uid');
    }
}