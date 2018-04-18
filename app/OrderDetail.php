<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class OrderDetail extends Model
{
    use Notifiable;

    protected $fillable = [
        'order_id', 'product_id', 'quantity_pro', 'size', 'discount','price'
    ];
    
    public function order(){
        return $this->belongsToMany('App\Order');
    }
    
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
