<?php

class UserTableSeeder extends Seeder {

    public function run() {

        $user = array(
            'username' => 'asd',
            'password' => Hash::make('asd'),
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        );

        DB::table('users')->insert($user);
    }

}
