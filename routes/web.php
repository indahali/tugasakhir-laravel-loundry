<?php
use App\Http\Controllers\cobacontroller;
use App\Http\Controllers\transaksicontroller;
use App\Http\Controllers\notecontroller;
use App\Http\Controllers\pricecontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/beranda', function () {
    return view('beranda');
});
route::get('', [cobacontroller::class, "index"]);
route::get('', [transaksicontroller::class, "index"]);
route::get('', [pricecontroller::class, "index"]);
//route::get('/customers', [cobacontroller::class, "index"]);
//route::get('/customers/create', [cobacontroller::class, "create"]);
//route::post('/customers', [cobacontroller::class, "store"]);
//route::get('/customers/{id}', [cobacontroller::class, "show"]);
//route::get('/customers/{id}/edit', [cobacontroller::class, "edit"]);
//route::put('/customers/{id}', [cobacontroller::class, "update"]);
//Route::delete('/customers/{id}', [CobaController::class, 'destroy']);
route::resource('customers', cobacontroller::class);
route::resource('prices', pricecontroller::class);
route::resource('transactions', transaksicontroller::class);
route::resource('notes', notecontroller::class);