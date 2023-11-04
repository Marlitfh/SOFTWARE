<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_code')->unique()->nullable();
            $table->string('prod_name')->unique();
            $table->decimal('prod_stock')->default(0);
            $table->string('prod_image')->nullable();
            $table->decimal('prod_price', 12, 2);
            $table->date('prod_expiration')->nullable();
            // $table->enum('prod_status', ['ACTIVE','EXPIRED', 'IMPERFECT', 'OBSOLETE'])->default('ACTIVE');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
