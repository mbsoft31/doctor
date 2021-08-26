<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("gender");
            $table->string("birthdate");
            $table->string("birth_place");
            $table->string("address");
            $table->string("city");
            $table->string("zip");
            $table->string("country");
            $table->foreignId("user_id")
                ->constrained()
                ->onDelete("cascade");
            $table->foreignId("speciality_id")
                ->constrained()
                ->onDelete("cascade");
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
        Schema::dropIfExists('doctors');
    }
}
