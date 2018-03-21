<?php
namespace App\Http\Composers;
use Illuminate\Support\Facades\DB;
use App\Child_category;
use App\Parent_category;
use Illuminate\Contracts\View\View;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CategoryWidgetComposer{
    public function compose(View $view) {
        $categories = Child_category::get();
        $view->with('categories',$categories);
    }
}
