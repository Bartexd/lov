<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 12.12.2017
 * Time: 17:12
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{

    protected $table = "Photos";
    protected $primaryKey = "uid";
    protected $fillable = ["photo_uid", "photo_url"];

    public function gallery()
    {
        return $this->hasOne('Models\Gallery','uid', 'photos_uid');
    }
}