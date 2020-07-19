<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40);
            $table->string('email', 50);
            $table->string('pass', 20);
            $table->enum('city',['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']);
            $table->text("address")->nullable();
            $table->string('tel', 12);
            $table->date('date');
            $table->smallInteger('role')->default(0);
            $table->string('insta', 20)->nulable();
            $table->string('tw', 20)->nulable();
            $table->string('fb', 20)->nulable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
