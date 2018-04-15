<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Cart;
use Session;
use App\PriceSizes;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        $products = Product::where('is_delete', '=', '0')->orderBy('created_at', 'desc')->limit(12)->get();
        $products_new = Product::where('is_delete', '=', '0')->orderBy('created_at', 'desc')->limit(6)->get();
        return view('home', compact('products', 'products_new'));
    }

    public function index1() {
        $products = Product::where('is_delete', '=', '0')->orderBy('created_at', 'desc')->paginate(9);
        return view('products', compact('products'));
    }

    public function index2($id) {
        $product_detail = Product::where('id', $id)->first();
        $images = Image::select('id', 'link_image')->where('product_id', $product_detail->id)->get();
        $price_sizes = PriceSizes::select('id', 'size', 'quality', 'price', 'quantity')->where('product_id', $product_detail->id)->get();
        $sizes = PriceSizes::select('size','quality', 'price', 'quantity')->where([['product_id', $product_detail->id], ['is_price', 0]])->first();
        $comments = Comment::where([['product_id', $product_detail->id], ['parent_id', '=', '0']])->get();
        return view('product_details', compact('product_detail', 'images', 'price_sizes', 'comments', 'sizes'));
    }

    public function getSizeAddtoCart(Request $request) {
        $id = $request->id;
        $price = $request->price;
        $quantity = $request->quantity;
        $product = Product::find($id);
//        $price = $request->price;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->priceadd($product, $product->id, $price, $quantity);
        $request->session()->put('cart', $cart);
        return response()->json(['quantyti' => Session::get('cart')->totalQty]);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        
        return response()->json(['quantyti' => Session::get('cart')->totalQty, 'shipping' => Session::get('cart')->shipping, 'totalprice' => Session::get('cart')->totalPrice, 'totaltong' => Session::get('cart')->totaltong, 'qty' => Session::get('cart')->items[$id]['qty'], 'price' => Session::get('cart')->items[$id]['price']]);
    }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.check', ['total' => $total]);
    }

    public function postCheckout(Request $request) {
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_FqmN8OQbuxmJdDFsLYSaTWEp');
        try {
            $charges = Charge::create(array(
                        "amount" => $cart->totalPrice * 100,
                        "currency" => "usd",
                        "source" => $request->input('stripeToken'),
                        "description" => "Test Charges"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charges->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }

    public function deductByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deductByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return response()->json(['quantyti' => Session::get('cart')->totalQty, 'qty' => Session::get('cart')->items[$id]['qty'], 'price' => Session::get('cart')->items[$id]['price'], 'shipping' => Session::get('cart')->shipping, 'totaltong' => Session::get('cart')->totaltong, 'totalprice' => Session::get('cart')->totalPrice]);
    }

    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            $data = Session::put('cart', $cart);
        } else {
            $data = Session::forget('cart');
        }
        $quantity = Session::has('cart') ? Session::get('cart')->totalQty : 0;
        $shipping = Session::has('cart') ? Session::get('cart')->shipping : 0;
        $totalprice = Session::has('cart') ? Session::get('cart')->totalPrice : 0;
        $totaltong = Session::has('cart') ? Session::get('cart')->totaltong : 0;
        return response()->json(['html' => $data, 'quantity' => $quantity, 'shipping' => $shipping, 'totalprice' => $totalprice, 'totaltong' => $totaltong]);
    }

    public function del_img($id) {
        $images = Image::findOrFail($id);
        $image_id = $images->id;
        $image_product_id = $images->product_id;
        $image_link = $images->link_image;
        $deleteImg = Image::where('id', '=', $image_id)->delete();
        if (File::exists($image_link)) {
            File::delete($image_link);
        }
//        Storage::delete($images->link_image);

        $show_images = Image::where([['product_id', '=', $image_product_id], ['is_thumbnail', '=', 0], ['is_delete', '=', 0]])->get();
        return response()->json(['images' => $show_images]);
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

    public function searchprice(Request $request) {

        $input = $request->all();
        $size_query = isset($input['sizes']) ? $input['sizes'] : array(); //kierm tra size co ton tai hay khong

        $priceFrom = $input['priceFrom'];
        $priceTo = $input['priceTo'];
        $name = $input['name'];
        $product = array();
        $query = DB::table('products')
                ->leftJoin('price_sizes', 'price_sizes.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('images', 'images.product_id', '=', 'products.id')
                ->where('images.is_thumbnail', '1')
                ->where('products.name', 'like', '%' . $name . '%')
                ->whereBetween('price', [$priceFrom, $priceTo])//select gia tu A den B
                ->select('products.name AS product_name', 'products.id AS product_id', 'categories.name', 'price_sizes.price', 'price_sizes.size', 'images.link_image');

        // Kiem tra size trong DB
        if (count($size_query) > 0) {
            $query->whereIn('size', $size_query);
        }
        $first = $query->get();

        return response()->json(['product' => $first, 'message' => $query->toSql(), 'bindind' => $query->getBindings()]);
//        return redirect()->back();
    }

    public function getSizeProduct(Request $request) {
        $id = $request->id;
        $size = $request->size;
        $sizes = PriceSizes::select('price', 'quantity')->where([['product_id', $id], ['size', $size]])->first();
        return response()->json(['size' => $sizes]);
    }

}
