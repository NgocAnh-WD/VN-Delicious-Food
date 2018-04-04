<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use Session;
use App\Cart;
class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|min:10',
            'name' => 'required|min:2',
            'phone' => 'required|min:10|max:12',
            'city' => 'required|min:4',
            'district' => 'required|min:4',
            'ward' => 'required',
            'hamlet' => 'required',
                ], [
            'email.required' => 'Vui lòng nhập email người nhận.',
            'name.required' => 'Vui lòng nhập tên người nhận.',
            'phone.required' => 'Vui lòng nhập sđt người nhận.',
            'city.required' => 'Vui lòng nhập thành phố người nhận.',
            'district.required' => 'Vui lòng kiểm tra dữ liệu.',
            'ward.required' => 'Vui lòng kiểm tra dữ liệu xã phường.',
            'hamlet.required' => 'Vui lòng kiểm tra dữ liệu thôn.'
        ]);
        $input = $request->all();
        $input['email'] = $request['email'];
        $input['full_name'] = $request['name'];
        $input['address'] = $request['hamlet'] . '-' . $request['ward'] . '-' . $request['district'] . '-' . $request['city'];
        $input['phone'] = $request['phone'];
//        $customer = Customer::create($input);
//        if ($customer) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $hour = date('H');
            $min = date('i');
            $second = date('s');
            $now = $year . '/' . $month . '/' . $day . '/' . $hour . '/' . $min . '/' . $second;
            $input['order_date'] = $now;
            $input['required_date'] = $now;
            $input['note'] = 'Bình thường';
//            $input['customer_id'] = $customer->id;
            $input['shipped_date'] = $now;
            $input['status'] = 0;
            $input['is_delete'] = 0;
//            $order = Order::create($input);
//            if($order!= null){
//                $input_order['order_id'] = $order->id;
                $oldCart = Session::get('cart');
//                var_dump($oldCart->items); $oldCart->items;
         $temp[]=$oldCart->items;
         foreach ($temp as $key => $value) {
             var_dump($key);
         }
//            }
//        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
