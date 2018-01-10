<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 30.12.2017
 * Time: 21:21
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class SidebarGallery extends Model
{

    protected $table = "sidebar_gallery";
    protected $primaryKey = "uid";
    protected $fillable = ["name", "id", "url"];

}