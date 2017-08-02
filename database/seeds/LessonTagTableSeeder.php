<?php

use App\Tag;
use App\Lesson;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $lessonIds = Lesson::pluck('id')->toArray();
        $tagIds = Tag::pluck('id')->toArray();

        foreach(range(1, 30) as $idx) {
            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lessonIds),
                'tag_id' => $faker->randomElement($tagIds),
            ]);
        }
    }
}
