<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth', 'namespace' => 'App\Http\Controllers' ], function (){

    // Invoices
    Route::group(['namespace'=>'Invoice', 'prefix'=>'invoices'], function(){
        Route::get('/create', 'CreateController')->name('invoices.create');
        Route::post('/', 'StoreController')->name('invoices.store');
        Route::get('/{invoice}', 'ShowController')->name('invoices.show');
        Route::get('/{invoice}/download', 'DownloadController')->name('invoices.download');
    });

    // Customers
    Route::group(['namespace'=>'Customer', 'prefix'=>'customers'], function(){
        Route::get('/', 'IndexController')->name('customers.index');
        Route::get('/create', 'CreateController')->name('customers.create');
        Route::post('/', 'StoreController')->name('customers.store');
    });

    // Products
    Route::group(['namespace'=>'Product', 'prefix'=>'products'], function(){
        Route::get('/', 'IndexController')->name('products.index');
        Route::get('/create', 'CreateController')->name('products.create');
        Route::post('/', 'StoreController')->name('products.store');
    });
});
