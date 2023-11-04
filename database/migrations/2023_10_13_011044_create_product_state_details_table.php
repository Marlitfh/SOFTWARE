<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_state_details', function (Blueprint $table) {
            $table->id();
            $table->date('prod_stat_deta_date');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            // $table->date('prod_stat_deta_prod_expiration');
            $table->unsignedBigInteger('product_state_id');
            $table->foreign('product_state_id')->references('id')->on('product_states');
            $table->decimal('prod_stat_deta_cantidad');
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
        Schema::dropIfExists('product_state_details');
    }
}
