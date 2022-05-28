<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; // jangan lupa tambahin Inventory Modelnya (di module belum ada dikasih tau)
use App\Models\Category;

class InventoryController extends Controller
{
    public function viewCreate(){ // function untuk menampilkan page untuk add item
        $categories = Category::all();
        return view('create', compact('categories'));
    }
    
    public function create(Request $request){ // function untuk melakukan post request add item
        //CARA BKIN VALIDASI BACKEND DI CONTROLLER :
        // -	Kategori Barang, required string
        // -	Nama Barang (minimal 5 huruf, maksimal 80 huruf), required string
        // -	Harga Barang (harus dimulai dengan Rp. dari display-nya (HTML)), required integer
        // -	Jumlah Barang (harus menggunakan angka), required integer
        // -	Foto Barang 
        
        // dibawah ini, pakai name di blade.php
        $request->validate([
            'category' => ['required', 'string'],
            'itemName' => ['required', 'string', 'min:5', 'max:80'],
            'itemPrice' => ['required','integer'], // Rp. nya kita tampilkan pake HTML saja, karena input berupa int bukan string
            'itemQuantity' => ['required', 'integer'],
            'itemImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg']
            // bisa juga dalam bentuk spt dibawah ini :
            // 'itemImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // https://stackoverflow.com/questions/40434642/laravel-validation-difference-between-numeric-and-integer
        ]);
        
        // https://www.codewall.co.uk/upload-image-to-database-using-laravel-tutorial-with-example/
        // https://www.tutsmake.com/laravel-8-image-upload-tutorial/
        
        // dd(public_path() . '/images'); --> untuk debug
        $imageName = $request->itemImage->getClientOriginalName();
        // dd($imageName); --> untuk debug
        $path = $request->itemImage->storeAs('images', $imageName);

        // $path = $request->itemImage->store(public_path() . '/images/', $imageName);
        
        // https://stackoverflow.com/questions/60501302/what-is-difference-between-store-and-storeas-function-in-laravel
        
        // dd($request->itemImage); --> untuk debug

        // dibawah ini, pakai nama column di db
        Inventory::create([
            'itemName' => $request->itemName,
            'itemPrice' => $request->itemPrice, 
            'itemQuantity' => $request->itemQuantity,
            'itemImage' => $path,
            'categoryID' => $request->category
        ]);
        return redirect('view');
    }

    // --------------------------------------------READ---------------------------------------------------
    public function viewInventory(){ // function untuk menampilkan page view item
        $items = Inventory::all();
        return view('view')->withItems($items);
    }

    
    // --------------------------------------------UPDATE---------------------------------------------------
    public function viewUpdate($id){ // function untuk menampilkan page update / edit item
        $editItem = Inventory::find($id);
        return view('update', ['item' => $editItem]);
    }

    public function update(Request $request, $id){ // function untuk melakukan post request update item
        $item = Inventory::where('id', '=', $id)->first();

        // $item->validate([
        //     'category' => ['required', 'string'],
        //     'itemName' => ['required', 'string', 'min:5', 'max:80'],
        //     'itemPrice' => ['required','integer'], // Rp. nya kita tampilkan pake HTML saja, karena input berupa int bukan string
        //     'itemQuantity' => ['required', 'integer'],
        // ]);

        $item->update([
            'category' => $request->category,
            'itemName' => $request->itemName,
            'itemPrice' => $request->itemPrice, 
            'itemQuantity' => $request->itemQuantity, 
            'itemImage' => $request->itemImage
        ]);

        return redirect('view');
    }

    // --------------------------------------------DELETE---------------------------------------------------
    public function delete($id){
        Inventory::destroy($id);
        return redirect('view');
    }
}
