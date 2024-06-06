<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

use Illuminate\Http\Request;

Route::get('/data', [IndexController::class, 'index']);
Route::get('/group', [IndexController::class, 'group']);

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
Route::group(['prefix' => 'index'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.add');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/forcedelete/{id}', [CustomerController::class, 'forcedelete'])->name('customer.forcedelete');
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/view', [CustomerController::class, 'view']);
    Route::get('/view/softdelete', [CustomerController::class, 'softdelete']);
    Route::post('/', [CustomerController::class, 'store']);
});

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