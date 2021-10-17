<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $user_views = array(
          array('user_id' => '1','suggestion_id' => NULL,'views' => '10'),
          array('user_id' => '1','suggestion_id' => NULL,'views' => '5')
        );
        DB::table('user_views')->insert($user_views);
    }
}
