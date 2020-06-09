<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

    protected $fillable = [ 'email', 'first_name', 'last_name', 'password', 'avatar' ];

    protected $hidden = [ 'password' ];

}