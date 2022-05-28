<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // use HasFactory;
    protected $fillable = [
        'itemName', 'itemPrice', 'itemQuantity', 'itemImage','categoryID',
    ];
    
    public function categories(){
        return $this->belongsTo(Category::class, 'categoryID');
    }
}
