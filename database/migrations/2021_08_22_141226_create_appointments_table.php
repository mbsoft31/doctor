<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string("time");
            $table->string("state")->default("accepted");
            $table->text("metas");
            $table->foreignId("patient_id")->constrained()->onDelete("cascade");
            $table->string("appointment_at_type");
            $table->unsignedBigInteger("appointment_at_id");
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
        Schema::dropIfExists('appointments');
    }
}
