<?php

namespace App\Http\Controllers;
use App\Image;
use App\Category;
use App\User;
use App\Product;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::orderBy('created_at', 'asc')->paginate(3);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::pluck('name', 'id')->all();
       // var_dump($categories);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        
        
//        if($user) {
//            $input['user_id'] = $user->id;
//            $post = new Post();

            if($file = $request->file('photo_id')) {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $sub_folder = $year.'/'.$month.'/'.$day.'/';
                $upload_url= 'images/'.$sub_folder;

                if (! File::exists(public_path().'/'.$upload_url)) {
                       File::makeDirectory(public_path().'/'.$upload_url,0777,true);
                  }

                $name = time() . $file->getClientOriginalName();


                $file->move($upload_url, $name);

                $image = Image::create(['file'=> $upload_url. $name]);


                $input['photo_id'] = $photo->id;


                }

                $post->create($input);


                return redirect('/admin/products');
            
//        } else {
//            return view("errors.submit-error", ["data"=>"Please login as administrator!"]);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $products = Product::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $products = Product::findOrFail($id);
         
         $input = $request->all();
         
           if ($file = $request->file('photo_id')) {
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

           $photo = Photo::create(['file' => $upload_url . $name]);


           $input['photo_id'] = $photo->id;
       }else{ 
           
           
            }
             $products->update($input);
            return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $products = Post::findOrFail($id);

        $products->delete();


        \Illuminate\Support\Facades\Session::flash('deleted_product','The product has been deleted');


        return redirect('/admin/products');
    }
}
