<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model {

    use Notifiable;
    
    protected $fillable = [
        'parent_id','name','description','is_delete'
    ];
    public function parent() {
        return $this->belongsTo('App\Category','parent_id','id');
    }
    public function children() {
        return $this->hasMany('App\Category','parent_id','id');
    }
}
