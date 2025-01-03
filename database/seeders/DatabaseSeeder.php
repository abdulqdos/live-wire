<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Greeting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Greeting::create([
            'greeting' => 'hello',
        ]);
        Greeting::create([
            'greeting' => 'hey',
        ]);
        Greeting::create([
            'greeting' => 'hi',
        ]);
        Greeting::create([
            'greeting' => 'hola',
        ]);

        Article::factory(50)->create();
    }
}
