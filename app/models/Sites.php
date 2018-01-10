<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 21.12.2017
 * Time: 21:40
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{

    protected $table = "sites";
    protected $primaryKey = "uid";
    protected $fillable = ["route_name", "site_title", "site_content"];


}