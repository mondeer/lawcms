<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matter_name');
            $table->string('matter_type');
            $table->string('counsel_incharge');
            $table->string('opposing_counsel')->nullable();
            $table->string('file_date');
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('client_mobile');
            $table->string('matter_status');
            $table->string('created_by');
            $table->string('student_incharge')->nullable();
            $table->string('clerk_incharge')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matters');
    }
}
