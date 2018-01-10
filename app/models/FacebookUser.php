<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 13.12.2017
 * Time: 16:19
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class FacebookUser extends Model
{
    protected $table = "fb_users";
    protected $primaryKey = "uid";
    protected $fillable = ["first_name", "last_name", "picture", "email", "ip_address"];

    public function comments()
    {
        return $this->hasMany("Models\Comments", "uid", "user_uid");
    }

}