<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $cust = new Customer();  // Create a new instance of Customer
        $url = url('/index');
        $title = "User Registration Form";
        $data = compact('cust', 'url', 'title');  // Include $cust in the data array

        return view('form')->with($data);
    }
    public function store(Request $request)
    {

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
    public function view(Request $request)
    {
        $search = $request->input('search', '');

        if ($search != '') {
            $cust = Customer::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->paginate(10);
        } else {
            $cust = Customer::paginate(10);
        }

        return view('customer_details', compact('cust', 'search'));
    }


    public function softdelete()
    {
        $cust = Customer::onlyTrashed()->get();

        $data = compact('cust');
        return view('customersoftdelete')->with($data);
    }

    public function delete($id)
    {
        $cust = Customer::find($id)->delete();
        return redirect('/index/view');

    }
    public function forcedelete($id)
    {
        $cust = Customer::withTrashed()->find($id);
        if (!is_null($cust)) {
            $cust->forceDelete();
        }
        return redirect('/index/view');

    }
    public function restore($id)
    {
        $cust = Customer::withTrashed()->find($id);
        if (!is_null($cust)) {
            $cust->restore();
        }
        return redirect('/index/view');

    }
    public function edit($id)
    {
        $cust = Customer::find($id);
        if (is_null($cust)) {
            return redirect('/index/view');
        } else {
            $title = "Update Form";
            $url = url('/index/update') . "/" . $id;
            $data = compact('cust', 'url', 'title');
            var_dump($cust);
            return view('form')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $cust = Customer::find($id);
        $cust->name = $request['name'];
        $cust->email = $request['email'];
        $cust->address = $request['address'];
        $cust->state = $request['state'];
        $cust->country = $request['country'];
        $cust->dob = $request['dob'];
        $cust->save();
        return redirect('/index');

    }

}
