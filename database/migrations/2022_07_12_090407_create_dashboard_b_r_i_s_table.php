<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardBRISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_b_r_i_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_akun');
            $table->string('nama_akun');
            $table->enum('status', ['1', '2', '3'])->default('2');
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
        Schema::dropIfExists('dashboard_b_r_i_s');
    }
}
