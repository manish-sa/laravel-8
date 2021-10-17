<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_industries', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('industry_id')->nullable()->index('industry_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_industries');
    }
}
