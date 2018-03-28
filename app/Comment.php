<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'product_id','parent_id', 'title', 'content', 'is_delete', 'created_at'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function product() {
        return $this->belongsTo('App\Product');
    }
    
    public function children() {
        return $this->hasMany('App\Comment','parent_id','id');
    }
}
