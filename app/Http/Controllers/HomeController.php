<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;
use App\Image;
use App\Cart;
use App\User;
use Session;
use App\Price_size;
use App\Comment;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $image_products = Image::limit(12)->get();
        $image_products_new = Image::limit(6)->get();
        return view('home', compact('image_products', 'image_products_new'));
    }

    public function index1() {
        $image_products = DB::table('products')
                ->leftJoin('price_sizes', 'products.id', '=', 'price_sizes.product_id')
                ->leftJoin('images', 'products.id', '=', 'images.product_id')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.name', 'products.id AS product_id', 'price_sizes.price', 'images.link_image', 'categories.name AS name_category')
                ->paginate(9);
        return view('products', compact('image_products'));
    }

    public function index2($id) {
        $product_detail = DB::table('products')->where('id', $id)->first();
        $image = DB::table('images')->select('id', 'link_image')->where('product_id', $product_detail->id)->get();
        $price_size = DB::table('price_sizes')->select('id', 'size', 'quality', 'price', 'quantity')->where('product_id', $product_detail->id)->get();
        $comment = Comment::where([['product_id', $product_detail->id], ['parent_id', '=', '0']])->get();
        return view('product_details', compact('product_detail', 'image', 'price_size', 'comment'));
}
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));

        return redirect()->back();
    }
    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart  = new Cart($oldCart);
        return view('cart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    

    public function comment_product(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        if ($user) {
            $input['user_id'] = $user->id;
            $input['is_delete'] = 0;
            $comments = new Comment();
            Comment::create($input);
        }
    }

    public function index3() {
        return view('cart');
    }

    public function index4() {
        return view('layouts/admin');
    }

    public function get_products_by_category($id) {
        $image_products = DB::table('products')
                ->leftJoin('price_sizes', 'products.id', '=', 'price_sizes.product_id')
                ->leftJoin('images', 'products.id', '=', 'images.product_id')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.name', 'products.id AS product_id', 'price_sizes.price', 'images.link_image', 'categories.name AS name_category')
                ->where('products.category_id', '=', $id)
                ->paginate(9);
        return view('products', compact('image_products'));
    }

}
