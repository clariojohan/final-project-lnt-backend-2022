<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('category');         #required string
            $table->string('itemName');         #required string | 5 s/d 80 alphabet
            $table->integer('itemPrice');       #required integer | start with "Rp."
            $table->integer('itemQuantity');    #required integer | only use numbers
            $table->string('itemImage');        # using URL?
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
        Schema::dropIfExists('inventories');
    }
}
