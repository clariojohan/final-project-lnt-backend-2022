<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; // jangan lupa tambahin Inventory Modelnya (di module belum ada dikasih tau)
use App\Models\Category;

class InventoryController extends Controller
{
    // --------------------------------------------CREATE-------------------------------------------------
    public function viewCreate(){ // function untuk menampilkan page untuk add item
        $categories = Category::all(); // variable untuk menampung semua categories yang ada di tabel categories
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
        $path = $request->itemImage->storeAs('/images', $imageName);

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

    public function viewCreateCategory(){ // function untuk menampilkan page untuk add category
        return view('create-category');
    }
    
    public function createCategory(Request $request){ // function untuk melakukan post request add category
        
        // dibawah ini, pakai name di blade.php
        $request->validate([
            'categoryName' => ['required', 'string']
        ]);

        Category::create([
            'categoryName' => $request->categoryName
        ]);

        return redirect('view');
    }

    // --------------------------------------------READ---------------------------------------------------
    public function viewInventory(){ // function untuk menampilkan page view item
        $items = Inventory::all();
        $categories = Category::all();
        // $images = Storage::url("/storage/app/{$images->filename}");
        //https://www.devopsschool.com/blog/how-to-store-and-retrieve-image-from-the-database-in-laravel
        return view('view', compact('items', 'categories'));
    }

    
    // --------------------------------------------UPDATE---------------------------------------------------
    public function viewUpdate($id){ // function untuk menampilkan page update / edit item
        $categories = Category::all();
        $editItem = Inventory::find($id);
        return view('update', ['item' => $editItem], compact('categories'));
    }

    public function update(Request $request, $id){ // function untuk melakukan post request update item
        $item = Inventory::where('id', '=', $id)->first();

        $request->validate([
            'itemName' => ['required', 'string', 'min:5', 'max:80'],
            'itemPrice' => ['required','integer'], // Rp. nya kita tampilkan pake HTML saja, karena input berupa int bukan string
            'itemQuantity' => ['required', 'integer'],
            'itemImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg']
        ]);
        
        $imageName = $request->itemImage->getClientOriginalName();
        $path = $request->itemImage->storeAs('/images', $imageName);

        $item->update([
            'itemName' => $request->itemName,
            'itemPrice' => $request->itemPrice, 
            'itemQuantity' => $request->itemQuantity, 
            'itemImage' => $path,
            'categoryID' => $request->category
        ]);

        return redirect('view');
    }

    // --------------------------------------------DELETE---------------------------------------------------
    public function delete($id){
        Inventory::destroy($id);
        return redirect('view');
    }
}




