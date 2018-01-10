<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 28.11.2017
 * Time: 17:21
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $fillable = ["last_loggin", "privilages", "displayname"];


    public function news()
    {
        return $this->hasMany('Models\News', 'user_id', 'user_id');
    }
}