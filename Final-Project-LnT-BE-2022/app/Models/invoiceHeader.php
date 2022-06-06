<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceHeader extends Model
{
    // use HasFactory;
    protected $fillable = [
        'invoiceAddress', 'invoicePostalCode'
    ];
    
    public function invoiceDetail(){
        return $this->hasMany(invoiceDetail::class, 'invoiceID');
    }
}
