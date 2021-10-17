<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserIndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_industries = array(
          array('user_id' => '1','industry_id' => '1'),
          array('user_id' => '2','industry_id' => '1'),
          array('user_id' => '3','industry_id' => '2'),
          array('user_id' => '4','industry_id' => '2'),
          array('user_id' => '5','industry_id' => '3'),
          array('user_id' => '6','industry_id' => '3'),
          array('user_id' => '7','industry_id' => '4'),
          array('user_id' => '8','industry_id' => '4'),
          array('user_id' => '9','industry_id' => '5'),
          array('user_id' => '10','industry_id' => '5'),
          array('user_id' => '11','industry_id' => '5'),
          array('user_id' => '1','industry_id' => '2')
        );
        DB::table('user_industries')->insert($user_industries);
    }
}
