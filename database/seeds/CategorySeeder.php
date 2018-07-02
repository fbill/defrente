<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Category::class,3)->create();
        DB::table('categories')->insert([
            'id' =>   '1',
            'fullname' =>   'Canciertos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'id' =>   '2',
            'fullname' =>   'Teatro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'id' =>   '3',
            'fullname' =>   'Deporte',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
