<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::insert([
            [
                'user_id'=>1,
                'product_id'=>1,
                'content'=>'món đồ đáng tiền',
                'rating'=>5,
                'created_at'=>now(),
            ],
            [
                'user_id'=>1,
                'product_id'=>1,
                'content'=>'quá mắt không đáng mua',
                'rating'=>4,
                'created_at'=>now(),
            ],

            
        ]);
    }
}
