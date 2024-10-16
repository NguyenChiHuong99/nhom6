<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsModel;
use Faker\Factory as Faker;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create();
        for ($i=0; $i < 15; $i++) { 
            ProductsModel::create([
                'name'=>$Faker->word(),
                'img'=>'hinh'.$i.'.jpg',
                'description'=>$Faker->randomFloat(2,10,1000),
                'categories_id'=>$Faker->numberBetween(1,10),
            ]);
        }
    }
}
