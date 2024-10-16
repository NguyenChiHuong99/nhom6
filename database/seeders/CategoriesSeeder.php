<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriesModel;
use Faker\Factory as Faker;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create();
        for ($i=0; $i < 5; $i++) { 
            CategoriesModel::create([
                'name'=>$Faker->word()
            ]);
        }
    }
}
