<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=0;$i<4;$i++){
            $title=$faker->sentence(6);
            DB::table('articles')->insert([
                'category_id'=>rand(1,3),
                'title'=>$title,
                'image'=>$faker->imageUrl(300,150,'cats',true,'toDoHomework'),
                'content'=>$faker->paragraph(6),
                'slug'=>str_slug($title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now()
            ]);
        }

    }
}
