<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Info_customer extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'full_name','address','phone'
    ];
    
}
