<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'username','date_of_birth','gender','address','email','phone','full_name','avata_image',
        'password','is_active','is_delete'
    ];
    
    protected $hidden = [
        'password','remember_token',
    ];
    public function category() {
        return $this->belongsTo('App\User');
    }
    
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function photo(){
        return $this->images()->get()->first();
    }
}
