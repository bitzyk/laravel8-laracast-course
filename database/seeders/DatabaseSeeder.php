<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        // user seeds
         $user1 = \App\Models\User::factory()->create();
         $user2 = \App\Models\User::factory()->create();

         // category seeds
         $workCategory = Category::create([
             'slug' => 'work',
             'name' => 'Work',
         ]);

        $hobbyCategory = Category::create([
            'slug' => 'hobbies',
            'name' => 'Hobbies',
        ]);

        $skiCategory = Category::create([
            'slug' => 'ski',
            'name' => 'Ski',
        ]);

        $posts = [
            [
                'category_id' => $workCategory->id,
                'user_id' => $user1->id,
                'title' => 'My first post',
                'slug' => 'first-post',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
                'published_at' => '2022-05-22',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            ],
            [
                'category_id' => $hobbyCategory->id,
                'user_id' => $user2->id,
                'title' => 'My second post',
                'slug' => 'second-post',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
                'published_at' => '2022-05-23',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            ],
            [
                'category_id' => $hobbyCategory->id,
                'user_id' => $user1->id,
                'title' => 'My third post',
                'slug' => 'third-post',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
                'published_at' => '2022-05-22',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            ],
            [
                'category_id' => $skiCategory->id,
                'user_id' => $user2->id,
                'title' => 'My fourth post',
                'slug' => 'fourth-post',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
                'published_at' => '2022-05-24',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
