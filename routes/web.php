<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customer', function () {
    $customer = Customer::all();
    echo "<pre>";

    print_r($customer->toArray());
});
Route::get('/product', function () {
    $customer = Customer::all();
    echo "<pre>";
    print_r($customer->toArray());
});
Route::get('/index', [CustomerController::class, 'index'])->name('customer.add');
Route::get('/index/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/index/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/index/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/index/view', [CustomerController::class, 'view']);
Route::post('/index', [CustomerController::class, 'store']);
Route::get('get-all-session', function () {
    $session = session()->all();
    p($session);
});
Route::get('set-session', function (Request $request) {
    $request->session()->put('name', 'Rakesh');
    $request->session()->put('id', '500');
    $request->session()->flash('status', 'Success');
    return redirect('get-all-session');

});
Route::get('destroy-session', function () {
    session()->forget('name', );
    session()->forget('id');
    return redirect('get-all-session');
});