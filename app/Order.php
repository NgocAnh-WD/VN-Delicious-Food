<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Order extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'order_date',
        'required_date',
        'note',
        'customer_id',
        'shipped_date',
        'status',
        'product_id',
    ];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function products() {
        return $this->hasMany('App\Product','product_id','id','name');
    }
    
    public function product(){
        return $this->products()->get()->all();
    }
   
    public function order_detail(){
        return $this->hasMany('App\OrderDetail','order_id','id');
    }
    
    public function is_detail(){
        return $this->order_detail()->get()->all();
    }     
    
}
