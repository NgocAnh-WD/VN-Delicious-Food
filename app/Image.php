<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id','product_id','link_image','is_delete','is_thumbnail'
    ];
    
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
