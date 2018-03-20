<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
           'name',
        'photo_id',
        'category_id',
        'description',

        
        
    ];
    
    public function category() {
        return $this->belongsTo('App\Child_category');
    }
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function photo(){
        return $this->images()->get()->first();
    }
}
