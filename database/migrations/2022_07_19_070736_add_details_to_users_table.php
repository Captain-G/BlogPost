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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profilePhoto')->nullable();
            $table->integer('followers')->default(0);
            $table->integer('following')->default(0);
            $table->integer('posts')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profilePhoto');
            $table->dropColumn('followers');
            $table->dropColumn('following');
            $table->dropColumn('posts');
        });
    }
};
