<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('location_name');
            $table->integer('category_id');//from category table to join RS
            $table->string('image');
          $table->text('location_detail');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_details');
    }
}
