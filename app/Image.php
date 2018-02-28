<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Image extends Model
{
    use Notifiable;

    protected $fillable = [
        'product_id', 'link_image', 'is_delete'
    ];
    
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
