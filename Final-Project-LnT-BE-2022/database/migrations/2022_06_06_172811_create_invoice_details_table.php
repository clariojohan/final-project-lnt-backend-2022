<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->foreignId('invoiceID')->references('invoiceID')->on('invoice_headers')->onupdate('cascade')->onDelete('cascade');
            $table->foreignId('itemID')->references('id')->on('inventories')->onupdate('cascade')->onDelete('cascade');
            $table->integer('invoiceItemQty');
            $table->primary(array('invoiceID', 'itemID'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
