<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' =>   '1',
            'fullname' =>   'Add Products',
            'link_menu'     =>   'admin.addProduct',
            'module_id'     =>   '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
