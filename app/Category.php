<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model {

    use Notifiable;

    protected $fillable = [
        'parent_id', 'name', 'description', 'is_delete'
    ];

    public function parent() {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }

    public function category_parent() {
        return $this->parent()->where([['parent_id', 0], ['is_delete', 0]])->get();
    }
    
    public function category_pa(){
        return $this->where([['parent_id', 0], ['is_delete', 0]])->get();
    }
    
    public function children() {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

}
