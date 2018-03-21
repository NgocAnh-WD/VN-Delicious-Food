<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parent_category extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id','name','is_delete'
    ];
    public function child_categories() {
        return $this->hasMany('App\Child_category', 'parent_id', 'id');
    }
}
