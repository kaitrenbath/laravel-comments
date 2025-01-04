<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $post = Post::factory()
            ->has(Comment::factory()->count(30))
            ->recycle($user)
            ->create();

        $post->comments->each(function ($comment) use ($post, $user) {
            Comment::factory()
                ->count(20)
                ->has(Comment::factory()->count(10), 'replies')
                ->recycle([$post])
                ->create(['parent_id' => $comment->id]);
        });

        Comment::factory()->recycle([$post])->create();
    }
}
