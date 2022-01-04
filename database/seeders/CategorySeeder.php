<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::create([
        	'name' => 'Desarrollo Web'
        ]);

        Category::create([
        	'name' => 'Desarrollo de videojuegos'
        ]);

        Category::create([
        	'name' => 'Lenguajes De Programación'
        ]);
    }
}
