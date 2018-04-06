<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model {

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
        return $this->hasMany('App\Image','product_id','id');
    }
    public function thumbnail() {
        return $this->images()->where([['is_thumbnail', 1], ['is_delete', 0]])->get()->last();
    }
    
    public function image() {
        return $this->images()->where([['is_thumbnail',0],['is_delete',0]])->get();
    }

//    public function photo(){
//        return $this->images()->get()->first();
//    }

    public function price() {
        return $this->hasMany('App\PriceSizes','product_id','id');
    }

    public function is_price() {
        return $this->price()->where([['is_price', 0], ['is_delete', 0]])->get()->last();
    }

//    public function size(){
//        return $this->price()->get()->first();
//    }

    public function order() {
        return $this->belongsToMany('App\Order');
    }

}
