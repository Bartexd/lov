<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 30.12.2017
 * Time: 21:53
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $table = "settings";
    protected $primaryKey = "uid";
    protected $fillable = ["key", "value"];


}