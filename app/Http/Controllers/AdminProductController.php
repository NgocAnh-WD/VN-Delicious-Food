<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\Category;
use App\User;
use App\Price_size;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderBy('created_at', 'asc')->paginate(3);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $child_categories = Category::pluck('name', 'id')->all();
        $price_size = Price_size::pluck('id')->all();
        return view('admin.products.create', compact('child_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();

        $product = new Product();
        $product->create($input);

        $product_id = DB::getPdo()->lastInsertId();


        if ($file = $request->file('link_image')) {
            $year = date('Y');
            $month = date('m');

            $day = date('d');
            $sub_folder = $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();


            $file->move($upload_url, $name);

            $image = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product_id]);
            
            $input = Price_size::created(['size','quality, price', 'quantity'=>$upload_file.$name]);
        }

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::findOrFail($id);

        $child_categories = Category::pluck('name', 'id')->all();

        return view('admin.products.edit', compact('product', 'child_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $input = $request->all();

        $product_id = $id;

        if ($file = $request->file('link_image')) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }
            $name = time() . $file->getClientOriginalName();
            $file->move($upload_url, $name);

            $image = Image::create(['link_image' => $upload_url . $name]);
            
             $input = Price_size::created(['size','quality, price', 'quantity'=>$upload_file.$name]);
        } else {
            
        }
        $product->update($input);
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $products = Product::findOrFail($id);
        $products->delete();
        \Illuminate\Support\Facades\Session::flash('delete_product', 'The product has been deleted');
        return redirect('/admin/products');
    }

}
