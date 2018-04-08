<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Order;
use Session;
use App\Cart;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;

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
        $user = Auth::user();
        if ($user) {
            if (isset($request['check_address'])) {
                $this->validate($request, [
                    'city' => 'required|min:4',
                    'district' => 'required|min:4',
                    'ward' => 'required',
                    'hamlet' => 'required',
                        ], [
                    'city.required' => 'Vui lòng nhập thành phố người nhận.',
                    'district.required' => 'Vui lòng kiểm tra dữ liệu.',
                    'ward.required' => 'Vui lòng kiểm tra dữ liệu xã phường.',
                    'hamlet.required' => 'Vui lòng kiểm tra dữ liệu thôn.'
                ]);
                DB::beginTransaction();
                try {
                    $input = $request->all();
                    $input['email'] = $request['email'];
                    $input['full_name'] = $request['name'];
                    $input['address'] = $request['hamlet'] . '-' . $request['ward'] . '-' . $request['district'] . '-' . $request['city'];
                    $input['phone'] = $request['phone'];
                    $customer = Customer::create($input);
                    if ($customer) {
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
                        $input['customer_id'] = $customer->id;
                        $input['shipped_date'] = $now;
                        $input['status'] = 0;
                        $input['is_delete'] = 0;
                        $order = Order::create($input);
                        if ($order != null) {
                            $items = Session::get('cart')->items;

                            foreach ($items as $item) {
                                $input['order_id'] = $order->id;
                                $input['product_id'] = $item['id'];
                                $input['quantity_pro'] = $item['qty'];
                                $input['size'] = $item['size'];
                                $input['discount'] = 0;
                                $orderdetail = OrderDetail::create($input);
                            }
                            Session::forget('cart');
                        }
                    }
                    DB::commit();
                } catch (Exception $ex) {
                    
                }
            } else {
                $this->validate($request, [
                    'address' => 'required|min:4',
                        ], [
                    'address.required' => 'Vui lòng nhập địa chỉ người nhận.'
                ]);
                DB::beginTransaction();
                try {
                    $input = $request->all();
                    $input['email'] = $request['email'];
                    $input['full_name'] = $request['name'];
                    $input['address'] = $request['address'];
                    $input['phone'] = $request['phone'];
                    $customer = Customer::create($input);
                    if ($customer) {
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
                        $input['customer_id'] = $customer->id;
                        $input['shipped_date'] = $now;
                        $input['status'] = 0;
                        $input['is_delete'] = 0;
                        $order = Order::create($input);
                        if ($order != null) {
                            $items = Session::get('cart')->items;

                            foreach ($items as $item) {
                                $input['order_id'] = $order->id;
                                $input['product_id'] = $item['id'];
                                $input['quantity_pro'] = $item['qty'];
                                $input['size'] = $item['size'];
                                $input['discount'] = 0;
                                $orderdetail = OrderDetail::create($input);
                            }
                            Session::forget('cart');
                        }
                    }
                    DB::commit();
                } catch (Exception $ex) {
                    
                }
            }
        } else {
            $this->validate($request, [
                'email' => 'required|min:10',
                'firstname' => 'required|min:1',
                'lastname' => 'required|min:2',
                'phone' => 'required|min:10|max:12',
                'city' => 'required|min:4',
                'district' => 'required|min:4',
                'ward' => 'required',
                'hamlet' => 'required',
                    ], [
                'email.required' => 'Vui lòng nhập email người nhận.',
                'firstname.required' => 'Vui lòng nhập tên người nhận.',
                'lastname.required' => 'Vui lòng nhập họ người nhận.',
                'phone.required' => 'Vui lòng nhập sđt người nhận.',
                'city.required' => 'Vui lòng nhập thành phố người nhận.',
                'district.required' => 'Vui lòng kiểm tra dữ liệu.',
                'ward.required' => 'Vui lòng kiểm tra dữ liệu xã phường.',
                'hamlet.required' => 'Vui lòng kiểm tra dữ liệu thôn.'
            ]);
            DB::beginTransaction();
            try {
                $input = $request->all();
                $input['email'] = $request['email'];
                $input['full_name'] = $request['lastname'] . $request['firstname'];
                $input['address'] = $request['hamlet'] . '-' . $request['ward'] . '-' . $request['district'] . '-' . $request['city'];
                $input['phone'] = $request['phone'];
                $customer = Customer::create($input);

                if ($customer) {
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
                    $input['customer_id'] = $customer->id;
                    $input['shipped_date'] = $now;
                    $input['status'] = 0;
                    $input['is_delete'] = 0;
                    $order = Order::create($input);
                    if ($order != null) {
                        $items = Session::get('cart')->items;

                        foreach ($items as $item) {
                            $input['order_id'] = $order->id;
                            $input['product_id'] = $item['id'];
                            $input['quantity_pro'] = $item['qty'];
                            $input['size'] = $item['size'];
                            $input['discount'] = 0;
                            $orderdetail = OrderDetail::create($input);
                        }
                        Session::forget('cart');
                    }
                }
                DB::commit();
            } catch (Exception $ex) {
                DB::rollBack();
                print_r($ex->getMessage());
            }
        }

        return redirect('products')->with('order', 'Bạn đã đặt hàng thành công');
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
