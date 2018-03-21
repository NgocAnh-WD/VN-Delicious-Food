<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Child_category extends Model {

    use Notifiable;
    
    protected $fillable = [
        'parent_id','name','description','is_delete'
    ];
    
    public function parent_category(){
        return $this->belongsToMany('App\Parent_category');
    }
}
