<?php
namespace App\Http\Composers;
use App\Category;
use Illuminate\Contracts\View\View;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CategoryWidgetComposer{
    public function compose(View $view) {
        $categories = Category::get();
        $view->with('categories',$categories);
    }
}
