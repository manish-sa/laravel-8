<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
          array('email' => 'manishsaini207@gmail.com','mobile' => '9096683298','profile_score' => '10','registered_on' => '2021-10-16 14:20:20'),
          array('email' => 'manish1@yopmail.com','mobile' => '9090909090','profile_score' => '25','registered_on' => '2021-10-16 14:20:20'),
          array('email' => 'manish2@yopmail.com','mobile' => '9191919191','profile_score' => '40','registered_on' => '2021-10-16 14:21:57'),
          array('email' => 'manish3@yopmail.com','mobile' => '9191919190','profile_score' => '30','registered_on' => '2021-10-16 14:21:57'),
          array('email' => 'manish4@yopmail.com','mobile' => '9191919194','profile_score' => '44','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish5@yopmail.com','mobile' => '9191919195','profile_score' => '45','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish6@yopmail.com','mobile' => '9191919196','profile_score' => '46','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish7@yopmail.com','mobile' => '9191919197','profile_score' => '47','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish8@yopmail.com','mobile' => '9191919198','profile_score' => '48','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish9@yopmail.com','mobile' => '9191919199','profile_score' => '49','registered_on' => '2021-10-16 14:23:10'),
          array('email' => 'manish10@yopmail.com','mobile' => '9191919110','profile_score' => '50','registered_on' => '2021-10-16 14:23:10')
        );
        DB::table('users')->insert($users);
    }
}
