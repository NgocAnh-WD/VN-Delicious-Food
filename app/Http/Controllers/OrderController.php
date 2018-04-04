<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;

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
        $customer = Customer::create($input);
        $order = Order::insert(
                        array('order_date' => 'NOW( )',
                            'required_date' => 'NOW( )',
                            'note' => 'Bình thường',
                            'status' => 0,
                            'is_delete' => 0,
                            'customer_id' => $customer->id,
                            'shipped_date' => '0000-00-00')
        );
//        $input['order_date'] = now();
//        $input['required_date'] = now();
//        $input['note'] = 'Bình thường';
//        $input['customer_id'] = $customer->id;
//        $input['shipped_date'] = '0000-00-00';
//        $input['status'] = 0;
//        $input['is_delete'] = 0;
//        $order = Order::create($input);
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
