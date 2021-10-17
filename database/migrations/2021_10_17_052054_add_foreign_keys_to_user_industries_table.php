<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_industries', function (Blueprint $table) {
            $table->foreign(['industry_id'], 'industry_id')->references(['id'])->on('industries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'user_ind_id')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_industries', function (Blueprint $table) {
            $table->dropForeign('industry_id');
            $table->dropForeign('user_ind_id');
        });
    }
}
