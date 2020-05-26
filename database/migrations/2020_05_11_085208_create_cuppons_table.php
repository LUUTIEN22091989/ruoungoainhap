<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuppons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cp_name');
            $table->string('cp_slug');
            $table->string('cp_code');
            $table->integer('cp_stock')->default(0);
            $table->tinyInteger('cp_condition')->default(0);
            $table->integer('cp_number')->default(0);
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
        Schema::dropIfExists('cuppons');
    }
}
