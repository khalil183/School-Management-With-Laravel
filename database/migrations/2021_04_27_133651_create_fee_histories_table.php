<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id_card');
            $table->integer('fee_category_id');
            $table->integer('month_id')->default(0);
            $table->integer('class_id');
            $table->integer('year_id');
            $table->double('amount');
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
        Schema::dropIfExists('fee_histories');
    }
}
