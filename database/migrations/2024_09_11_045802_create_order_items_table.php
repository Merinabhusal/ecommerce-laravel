<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

      class CreateOrderItemsTable extends Migration
    {
        public function up()
        {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('product_id');

                $table->decimal('price', 10, 2);
                $table->integer('quantity');
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            });
        }

        public function down()
        {
            Schema::dropIfExists('order_items');
        }
    }
