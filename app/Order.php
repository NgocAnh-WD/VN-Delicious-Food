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
    ];
    public function order_details(){
        return $this->belongsTo('App\OrderDetail');
    }
}
