<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Repply_comments extends Model {

    use Notifiable;
    
    protected $fillable = [
        'id','comment_id','user_id','content','is_delete'
    ];
    
    public function comments(){
        return $this->belongsToMany('App\Comment');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
