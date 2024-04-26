<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->password = md5($request['password']);
        $customer->dob = $request['dob'];
        $customer->points = 0;
        $customer->save();
        return redirect('/index/view');


    }
    public function view()
    {
        $cust = Customer::all();

        $data = compact('cust');
        return view('customer_details')->with($data);
    }
    public function delete($id)
    {
        $cust = Customer::find($id)->delete();
        return redirect('/index/view');

    }
}
