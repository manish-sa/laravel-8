<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
          array('name' => 'admin'),
          array('name' => 'manager'),
          array('name' => 'leader'),
          array('name' => 'user'),
          array('name' => 'peon')
        );
        DB::table('roles')->insert($roles);
    }
}
