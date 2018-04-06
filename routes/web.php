
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
    return view('welcome');
});


//Route::post('single/comment_product2', function () {
//    return array();
//});

Route::post('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@processLogin');
Route::get('logout', function() {
    Auth::logout(); // logout user
    return Redirect::to('/welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/products', 'HomeController@index1')->name('products');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/products', 'HomeController@index1')->name('products');
Route::get('/single/{id}', 'HomeController@index2')->name('product_details');
Route::get('/pro_cate/{id}', 'HomeController@get_products_by_category')->name('products');
Route::get('/cart', 'HomeController@index3')->name('cart');
Route::get('/admin', 'HomeController@index4')->name('admin');
Route::get('admin/comments/{id}/reply', 'AdminCommentsController@getReplyComment');
Route::get('admin/categories/{id}/child_categories', 'AdminCategoriesController@getChildCategory');
Route::post('single/comment_product2', 'HomeController@comment_product')->name('comment_product2');
Route::post('single/reply_product', 'HomeController@reply_product')->name('reply_product');
Route::resource('/profile','ClientController');
Route::resource('admin/products', 'AdminProductController', array('as' => 'admin'));
Route::resource('admin/categories', 'AdminCategoriesController', array('as' => 'admin'));
Route::resource('admin/users', 'AdminUserController', array('as' => 'admin'));
Route::resource('admin/comments', 'AdminCommentsController', array('as' => 'admin'));
Route::resource('orders', 'OrderController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('comment', function(Request $request) {
    $comment = App\Comment::create($request->input());
    return response()->json($comment);
});

Route::get('/addtocart/{id}', 'HomeController@getAddToCart');
Route::get('product/delete/{id}', 'HomeController@removeItem');
Route::get('product/deductbyone/{id}', 'HomeController@deductByOne');
Route::get('/shoppingcart', 'HomeController@getCart');
Route::get('/shipping', 'HomeController@Shipping');
Route::get('search','HomeController@getSearch')->name('search'); //search by name product

Route::get('/search-price','HomeController@searchprice')->name('searchprice'); //search by price, size...
Route::post('/searchprice', 'HomeController@searchprice');

Route::group(['middleware' => ['adminLogin']], function () {
    Route::resource('admin/users','AdminUserController', array('as' =>'admin'));
    Route::resource('admin/categories','AdminCategoriesController', array('as' =>'admin'));
    Route::resource('admin/products','AdminProductController', array('as' =>'admin'));
    Route::resource('admin/comments','AdminCommentsController', array('as' =>'admin'));
});

