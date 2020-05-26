<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('r_user_id')->default(0)->index(); // khách hay thành viên
            $table->string('r_name')->nullable();
            $table->string('r_email')->nullable();
            $table->integer('r_product_id')->default(0); // đánh giá sp nào
            $table->tinyInteger('r_type')->default(0); // chọn đánh giá nào
            $table->tinyInteger('r_status')->default(0); // duyệt hay ko duyệt
            $table->text('r_content')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
