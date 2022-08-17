<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Answer;
use App\Models\Artical;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Question::factory(100)->create();
        Answer::factory(500)->create();
        Artical::factory(50)->create();
        Comment::factory(500)->create();
        Like::factory(500)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
