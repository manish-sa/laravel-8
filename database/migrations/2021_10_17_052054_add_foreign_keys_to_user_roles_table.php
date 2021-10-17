<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign(['role_id'], 'role_id')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'user_id')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropForeign('role_id');
            $table->dropForeign('user_id');
        });
    }
}
