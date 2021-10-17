<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = array(
          array('user_id' => '1','role_id' => '1'),
          array('user_id' => '2','role_id' => '1'),
          array('user_id' => '3','role_id' => '2'),
          array('user_id' => '4','role_id' => '2'),
          array('user_id' => '5','role_id' => '3'),
          array('user_id' => '6','role_id' => '3'),
          array('user_id' => '7','role_id' => '4'),
          array('user_id' => '8','role_id' => '4'),
          array('user_id' => '9','role_id' => '5'),
          array('user_id' => '10','role_id' => '5'),
          array('user_id' => '11','role_id' => '5')
        );
        DB::table('user_roles')->insert($user_roles);
    }
}
