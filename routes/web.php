<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

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
Route::get('/index/view', [CustomerController::class, 'view']);
Route::post('/index', [CustomerController::class, 'store']);
