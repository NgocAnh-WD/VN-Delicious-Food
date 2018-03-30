<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use FullTextSearch;
    use Notifiable;
    protected $searchable = [
        'name',
    ];
    
    protected $fillable = [
           'name',
        'category_id',
        'description',   
    ];
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function thumbnail() {
       return $this->images()->where([['is_thumbnail', 1],['is_delete', 0]])->get()->last();
   }
//    public function photo(){
//        return $this->images()->get()->first();
//    }
    
    public function prices(){
        return $this->hasMany('App\Price_size');
    }
    public function is_price() {
       return $this->prices()->where([['is_price', 0],['is_delete', 0]])->get()->last();

   }
//    public function size(){
//        return $this->price()->get()->first();
//    }
    
      public function order()
    {
        return $this->belongsToMany('App\Order');
    }
}
