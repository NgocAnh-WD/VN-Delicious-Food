<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class OrderDetail extends Model
{
    use Notifiable;

    protected $fillable = [
        'order_id', 'product_id', 'quantity_pro', 'size', 'discount'
    ];
    
    public function order(){
        return $this->belongsToMany('App\Order');
    }
    
    public function product(){
        return $this->belongsToMany('App\Product');
    }
}
