<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\Category;
use App\User;
use App\PriceSizes;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $products = Product::orderBy('created_at', 'desc')->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $child_categories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.products.create', compact('child_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:2',
            'link_image' => 'required',
            'description' => 'required',
            'quality' => 'required',
            'price' => 'required',
            'quantity' => 'required',
                ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'link_image.required' => 'Vui lòng chọn ảnh chính.',
            'description.required' => 'Vui lòng mô tả chi tiết.',
            'quality.required' => 'Vui lòng kiểm tra dữ liệu.',
            'quantity.required' => 'Vui lòng kiểm tra dữ liệu.',
            'price.required' => 'Vui lòng kiểm tra dữ liệu.'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['name'] = $request->get('name');
            $input['category_id'] = $request->get('category_id');
            $input['description'] = $request->get('description');
            $input['is_delete'] = 0;
            $product = Product::create($input);
            if ($product != null) {
                $input['product_id'] = $product->id;
                $input['size'] = $request->get('size');
                $input['quality'] = $request->get('quality');
                $input['quantity'] = $request->get('quantity');
                $input['price'] = $request->get('price');
                $input['is_price'] = 0;
                $price_size = PriceSizes::create($input);
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
                    $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 1]);
                }
                if ($file = $request->file('image')) {
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
                    $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 0]);
                }
            }
            DB::commit();
        } catch (Exception $ex) {
            
        }
        return redirect('/admin/products')->with('create_product', 'Bạn đã thêm sản phẩm thành công');
//        $input = $request->all();
//        $product = Product::create($input);
//        $input['product_id'] = $product->id;
//        $input['size'] = $request->get('size');
//        $input['quality'] = $request->get('quality');
//        $input['price'] = $request->get('price');
//        $input['quantity'] = $request->get('quantity');
//        $input['is_delete'] = 0;
//        PriceSizes::create($input);
//
//        if ($file = $request->file('link_image')) {
//            $year = date('Y');
//            $month = date('m');
//
//            $day = date('d');
//            $sub_folder = $year . '/' . $month . '/' . $day . '/';
//            $upload_url = 'images/' . $sub_folder;
//
//            if (!File::exists(public_path() . '/' . $upload_url)) {
//                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
//            }
//            $name = time() . $file->getClientOriginalName();
//            $file->move($upload_url, $name);
//            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 1]);
//        }
//        if ($file = $request->file('image')) {
//            $year = date('Y');
//            $month = date('m');
//
//            $day = date('d');
//            $sub_folder = $year . '/' . $month . '/' . $day . '/';
//            $upload_url = 'images/' . $sub_folder;
//
//            if (!File::exists(public_path() . '/' . $upload_url)) {
//                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
//            }
//            $name = time() . $file->getClientOriginalName();
//            $file->move($upload_url, $name);
//            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 0]);
//        }
//
//        return redirect('/admin/products');
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
        $child_categories = Category::where('parent_id', '!=', 0)->pluck('name', 'id');
        $images = Image::pluck('id')->all();
        $price_sizes = PriceSizes::pluck('id')->all();
        return view('admin.products.edit', compact('product', 'child_categories', 'price_sizes'));
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
        DB::beginTransaction();
        try {
            $size = $request->get('size');
            $select_price = PriceSizes::where([['product_id', '=', $product->id], ['size', '=', $size]])->first();
            if (!$select_price) {
                DB::table('price_sizes')->insert(
                        ['product_id' => $product->id,
                            'size' => $size,
                            'quality' => $request->get('quality'),
                            'price' => $request->get('price'),
                            'quantity' => $request->get('quantity'),
                            'is_delete' => '0',
                            'is_price' => '1',
                            'created_at' => DB::raw('now()'),
                            'updated_at' => DB::raw('now()'),
                        ]
                );
            } else {
                $price_size = PriceSizes::where([['product_id', '=', $product->id], ['size', '=', $size]])
                        ->update(['quality' => $request->get('quality'), 'price' => $request->get('price'), 'quantity' => $request->get('quantity')]);
            }
            $update_product = Product::where('id', '=', $product->id)->update(['name' => $request->get('name'), 'category_id' => $request->get('category_id')]);

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
            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 1]);
        }
        if ($file = $request->file('image')) {
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
            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 0]);
        }
            DB::commit();
        } catch (Exception $ex) {
            
        }
//
//        if ($file = $request->file('link_image')) {
//            $year = date('Y');
//            $month = date('m');
//
//            $day = date('d');
//            $sub_folder = $year . '/' . $month . '/' . $day . '/';
//            $upload_url = 'images/' . $sub_folder;
//
//            if (!File::exists(public_path() . '/' . $upload_url)) {
//                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
//            }
//            $name = time() . $file->getClientOriginalName();
//            $file->move($upload_url, $name);
//            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 1]);
//        }
//        if ($file = $request->file('image')) {
//            $year = date('Y');
//            $month = date('m');
//
//            $day = date('d');
//            $sub_folder = $year . '/' . $month . '/' . $day . '/';
//            $upload_url = 'images/' . $sub_folder;
//
//            if (!File::exists(public_path() . '/' . $upload_url)) {
//                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
//            }
//            $name = time() . $file->getClientOriginalName();
//            $file->move($upload_url, $name);
//            $images = Image::create(['link_image' => $upload_url . $name, 'product_id' => $product->id, 'is_delete' => 0, 'is_thumbnail' => 0]);
//        }
//
//
//        $product->update($input);
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
//        $products = Product::findOrFail($id);
//        $products->delete();
//        \Illuminate\Support\Facades\Session::flash('delete_product', 'The product has been deleted');
//        return redirect('/admin/products');
    }

//    public function getImage($id) {
//        $images = Image::select('id', 'link_image')->where('product_id', $id)->get();
//        return view('/admin/products', compact('images'));
//    }
}
