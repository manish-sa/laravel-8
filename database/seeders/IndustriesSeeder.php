<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = array(
          array('name' => 'Auto'),
          array('name' => 'Banking'),
          array('name' => 'Education'),
          array('name' => 'eCommerce'),
          array('name' => 'Entertainment')
        );
        DB::table('industries')->insert($industries);
    }
}
