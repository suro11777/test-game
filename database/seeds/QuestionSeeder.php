<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Models\Question::class)
            ->times(20)
            ->create()
            ->each(function ($article) {
                $article->answers()->createMany(
                    factory(\App\Models\Answer::class, 3)->make()->toArray()
                );
            })->each(function ($article) {
                $article->answers()->createMany(
                    factory(\App\Models\Answer::class, 1)->make(['correct_answer' => 1])->toArray()
                );
            });
    }
}
