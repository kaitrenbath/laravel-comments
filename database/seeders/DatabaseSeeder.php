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
            $comment = Comment::factory()
                ->count(5)
                ->has(Comment::factory()->count(2), 'replies')
                ->recycle([$post, $user])
                ->create(['parent_id' => $comment->id]);

            $comment->each(function ($comment) use ($post, $user) {
                Comment::factory()
                    ->has(Comment::factory()->count(2), 'replies')
                    ->recycle([$post, $user])
                    ->create(['parent_id' => $comment->id]);
            });
        });

        Comment::factory()->recycle([$post])->create();
    }
}
