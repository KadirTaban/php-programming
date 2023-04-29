<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['Daily Homeworks','Weekly Homeworks','Monthly Homeworks '];
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>str_slug($category),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }

    }
}
