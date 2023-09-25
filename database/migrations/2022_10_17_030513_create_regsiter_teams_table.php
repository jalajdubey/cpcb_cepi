<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegsiterTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regsiter_teams', function (Blueprint $table) {
            $table->id();
            $table->string('TeamCode')->nullable();
            $table->integer('TeamNo')->default(0);
            $table->string('TeamLeader')->nullable();
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
        Schema::dropIfExists('regsiter_teams');
    }
}
