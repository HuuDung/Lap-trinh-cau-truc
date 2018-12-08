<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->integer('level')->default(\App\User::NORMAL);
            $table->integer('order')->default(0);
            $table->date('birthday')->nullable();
            $table->integer('gender');
            $table->integer('admin')->default(\App\User::NOT_ADMIN);
            $table->string('location')->nullable();
            $table->string('notes')->nullable();
            $table->integer('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
