<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class PriceSizes extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'product_id','size', 'quality', 'price', 'quantity', 'is_delete','is_price',
    ];
    
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
