<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceDetail extends Model
{
    // use HasFactory;
    protected $fillable = [
        'itemName', 'itemPrice', 'itemQuantity', 'itemImage','categoryID'
    ];
    
    public function invoiceHeader(){
        return $this->belongsTo(invoiceHeader::class, 'invoiceID');
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class, 'inventoryID');
    }
}
