<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductTable extends Migration
{
    
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('color_product');
    }
}
