<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'username','date_of_birth','gender','address','email','phone','password','avata_image',
        'full_name','is_acitve','is_delete'
    ];
    
    protected $hidden = [
        'password','remember_token',
    ];
}
