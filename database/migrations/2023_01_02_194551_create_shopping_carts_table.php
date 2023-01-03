<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['ACTIVE','PENDING','APROVED','FINISHED'])->default('ACTIVE');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('order_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
};
