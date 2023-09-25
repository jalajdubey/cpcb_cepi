<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIaeraUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iaera_users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('mobile');
            $table->string('state_id');
            $table->string('iarea');
            $table->string('catagrie_iarea');
            $table->string('lat');
            $table->string('long');
            $table->string('kmlfile');
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
        Schema::dropIfExists('iaera_users');
    }
}
