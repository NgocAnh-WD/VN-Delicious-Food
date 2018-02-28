<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slide extends Model {

    use Notifiable;

    protected $fillable = [
        'link_image', 'is_delete'
    ];

}
