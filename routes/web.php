
<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('home');
});

Route::post('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@processLogin');
Route::get('logout', function() {
    Auth::logout(); // logout user
    return Redirect::to('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'HomeController@index1')->name('products');
Route::get('/single/{id}', 'HomeController@index2')->name('product_details');
Route::get('/pro_cate/{id}', 'HomeController@get_products_by_category')->name('products');
Route::get('/cart', 'HomeController@index3')->name('cart');
Route::get('/admin', 'HomeController@index4')->name('admin');
Route::get('admin/comments/{id}/reply', 'AdminCommentsController@getReplyComment');
Route::get('admin/categories/{id}/child_categories', 'AdminCategoriesController@getChildCategory');
Route::get('/single/{id}/comment_product', 'HomeController@comment_product')->name('comment_product');

Route::resource('admin/products', 'AdminProductController', array('as' => 'admin'));
Route::resource('admin/categories', 'AdminCategoriesController', array('as' => 'admin'));
Route::resource('admin/users', 'AdminUserController', array('as' => 'admin'));
Route::resource('admin/comments', 'AdminCommentsController', array('as' => 'admin'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('comment', function(Request $request) {
    $comment = App\Comment::create($request->input());
    return response()->json($comment);
});

Route::get('/addtocart/{id}', 'HomeController@getAddToCart');
Route::get('/shoppingcart', 'HomeController@getCart');

Route::get('search','HomeController@getSearch')->name('search');


