<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'id' =>   '1',
            'fullname' =>   'Users',
            'description'     =>   'Module users',
            'name_menu'     =>   'Modules',
            'link_menu'     =>   'admin.listModules',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('modules')->insert([
            'id' =>   '2',
            'fullname' =>   'Products',
            'description'     =>   'Module Products',
            'name_menu'     =>   'Products',
            'link_menu'     =>   'admin.listProducts',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
