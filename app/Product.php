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
        return $this->belongsTo('App\Category');
    }
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function photo(){
        return $this->images()->get()->first();
    }
    
    public function price(){
        return $this->hasMany('App\Price_size');
    }
    
    public function size(){
        return $this->price()->get()->first();
    }
    
      public function order()
    {
        return $this->belongsToMany('App\Order');
    }
}
