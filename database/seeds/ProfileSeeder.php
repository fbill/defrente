<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'id' =>   '1',
            'fullname' =>   'Employee',
            'description'     =>   'Profile employee',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('profiles')->insert([
            'id' =>   '2',
            'fullname' =>   'Systems',
            'description'     =>   'Profile system',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('profiles')->insert([
            'id' =>   '3',
            'fullname' =>   'Client',
            'description'     =>   'Profile client',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('profiles')->insert([
            'id' =>   '4',
            'fullname' =>   'Security',
            'description'     =>   'Profile Security',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
