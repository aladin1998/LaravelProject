<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('fillier_id')->nullable();
            $table->string('name')->nullable();
            $table->year('annee')->nullable();
            $table->string('prenom')->nullable();;
            $table->string('CNE')->nullable();

            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_admin')->nullable();
            $table->boolean('is_represantant')->nullable();
            $table->foreign('fillier_id')->references('id')->on('filliers');
            //Email: admin@itsolutionstuff.com
              ///Password: 123456

              //Email: user@itsolutionstuff.com
               //Password: 123456
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
