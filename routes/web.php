<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Customer\Index as IndexCustomer;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/customer', IndexCustomer::class)->name('customer.index');

});
