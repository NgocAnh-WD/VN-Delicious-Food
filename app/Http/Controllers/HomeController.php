<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Cart;
use Session;
use App\PriceSizes;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct() {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::where('is_delete', '=','0')->orderBy('created_at', 'desc')->limit(12)->get();
        $products_new = Product::where('is_delete', '=','0')->orderBy('created_at', 'desc')->limit(6)->get();
        return view('home', compact('products', 'products_new'));
    }

    public function index1() {
        $products = Product::where('is_delete', '=','0')->orderBy('created_at', 'desc')->paginate(9);
        return view('products', compact('products'));
    }

    public function index2($id) {
        $product_detail = DB::table('products')->where('id', $id)->first();
        $image = DB::table('images')->select('id', 'link_image')->where('product_id', $product_detail->id)->get();
        $price_size = PriceSizes::select('id', 'size', 'quality', 'price', 'quantity')->where([['product_id', $product_detail->id], ['is_price', 0]])->get();
        $comments = Comment::where([['product_id', $product_detail->id], ['parent_id', '=', '0']])->get();
        return view('product_details', compact('product_detail', 'image', 'price_size', 'comments'));
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
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function deductByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deductByOne($id);
//        if (count($cart->items) > 0) {
        Session::put('cart', $cart);
//        } else {
//            Session::forget('cart');
//        }
        return redirect()->back();
    }

    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function Shipping() {
        if (!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shipping', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function comment_product(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        if ($user) {
            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->product_id = $request->get('product_id');
            $comment->title = $request->get('title');
            $comment->content = $request->get('content');
            $comment->save();
            return $comment;
        }
    }

        
    public function reply_product(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        if ($user) {
            $reply = new Comment();
            $reply->user_id = $user->id;
            $reply->title = $request->get('title');
            $reply->parent_id = $request->get('parent_id');
            $reply->product_id = $request->get('product_id');
            $reply->content = $request->get('content');
            $reply->save();
            return $reply;
        }
    }

    public function index3() {
        return view('cart');
    }

    public function index4() {
        return view('layouts/admin');
    }

    public function get_products_by_category($id) {
        $products = Product::where('category_id', $id)->paginate(9);
        return view('products', compact('products'));
    }

    public function getSearch() {
        $products = Product::search($_GET['key_search'])->paginate(9);
        $products->setPath('search?key_search=' . $_GET['key_search']);
        $key_search = $_GET['key_search'];
        return view('products', compact('products', 'key_search')); 
    }
    
    public function profile() {
        return view('/profile');
    }


//    public function searchprice()
//    {
//        $price = \Input::get('categories');
//        echo $price;
//        $price = (int) $price;
//        
//        if($price<50)
//        {
//            $products = \Price_size::where('price', $price)->get();
//        }else {
//            $products = \Price_size::where('price', $price)->get();
//    }
//        return \View::make('products')->with('products', $products); 
//    }
}
