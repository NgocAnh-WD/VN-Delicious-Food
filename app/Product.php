<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'category_id', 'description', 'is_delete'
    ];
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
