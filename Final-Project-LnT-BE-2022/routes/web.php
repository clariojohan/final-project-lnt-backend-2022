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
    return redirect('view');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/view', 'App\Http\Controllers\InventoryController@viewInventory')->middleware(['auth'])->name('view');

Route::group(['middleware'=>'auth', 'middleware'=>'isAdmin'], function () {
    Route::get('/create', 'App\Http\Controllers\InventoryController@viewCreate');
    Route::post('/create', 'App\Http\Controllers\InventoryController@create')->name('createItem');
    Route::get('/create-category', 'App\Http\Controllers\InventoryController@viewCreateCategory');
    Route::post('/create-category', 'App\Http\Controllers\InventoryController@createCategory')->name('createCategory');
    Route::get('/update/{id}', 'App\Http\Controllers\InventoryController@viewUpdate'); // jangan lupa ditambahkan untuk bagian page viewUpdate, (pada module tidak ada)
    Route::patch('/update/{id}', 'App\Http\Controllers\InventoryController@update')->name('updateItem');
    Route::delete('/delete/{id}', 'App\Http\Controllers\InventoryController@delete')->name('deleteItem');
});

require __DIR__.'/auth.php';
