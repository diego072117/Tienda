<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('categories')->insert([
            'name'=>'Juegos',
        ]);

        //2
        DB::table('categories')->insert([
            'name'=>'Juguetes',
        ]);

        //3
        DB::table('categories')->insert([
            'name'=>'Ropa',
        ]);
    }
}
