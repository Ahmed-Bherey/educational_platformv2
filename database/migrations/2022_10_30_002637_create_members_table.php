<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('username')->nullable();
            $table->string('firstName')->nullable();
            $table->string('secondName')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('subPassword')->nullable();
            $table->string('job')->nullable();
            $table->string('address')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('members');
    }
};
