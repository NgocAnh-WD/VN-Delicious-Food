<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parent_category extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id','name','is_delete'
    ];
}
