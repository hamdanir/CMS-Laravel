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

// Route::get('/h4l4m4nl0g1nR4m4Y4n4', 'LoginController@index');
// Route::post('/login-proses', 'LoginController@login');

// Route::group(['middleware' => ['revalidate','SessionCheck']], function () {
//     Route::get('/logout', 'LoginController@logout');
    
    


// });

    Route::get('/', 'HomeController@index');

    Route::get('/brands', 'BrandController@index')->name('brands.index');
    Route::post('createBrand', 'BrandController@store')->name('brands.store');
    Route::get('/createBrands', 'BrandController@create')->name('brands.create');
    Route::get('/updateBrands/{id}', 'BrandController@show');
    Route::get('/deleteBrands/{id}', 'BrandController@delete');
    Route::post('edit-brand-proses', 'BrandController@update');

    // Route::get('/types', 'TypeController@index');
    // Route::post('/types', 'TypeController@strore');

    Route::get('/types', 'TypeController@index')->name('types.index');
    Route::get('/createTypes', 'TypeController@create');
    Route::post('/types', 'TypeController@store')->name('types.store');
    Route::get('/updateTypes/{id}', 'TypeController@show');
    Route::put('/updateTypes/{id}', 'TypeController@update')->name('types.update');
    Route::get('/deleteTypes/{id}', 'TypeController@delete');

    Route::get('/product', 'ProductController@index');
    Route::get('/updateProduct/{id}', 'ProductController@show');
    Route::put('edit-product-proses', 'ProductController@update');
    Route::get('/createProducts', 'ProductController@create');
    Route::post('/product', 'ProductController@store')->name('product.store');
    Route::get('/deleteProducts/{id}', 'ProductController@delete');
    
    Route::get('/user', 'UserController@index');