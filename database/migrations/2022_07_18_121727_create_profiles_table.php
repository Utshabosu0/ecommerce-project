<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('address')->nullable();
            $table->string('bio')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
