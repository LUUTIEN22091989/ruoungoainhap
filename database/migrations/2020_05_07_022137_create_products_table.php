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
            $table->Increments('id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_category_id');
            $table->integer('pro_brand_id');
            $table->text('pro_desc');
            $table->text('pro_content');
            $table->string('pro_price');
            $table->string('pro_image');
            $table->tinyInteger('pro_status')->default(1);
            $table->tinyInteger('pro_hot')->default(0);
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
