<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id',
        'link_image',
        'is_delete'
    ];
    
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
