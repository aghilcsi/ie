<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('title', 50);
            $table->string('brand', 20);
            $table->string('year', 4);
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->date('date');
            $table->time("time");
            $table->mediumInteger('rate');
            $table->bigInteger('cat_id');
            $table->bigInteger('subcat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial');
    }
}
