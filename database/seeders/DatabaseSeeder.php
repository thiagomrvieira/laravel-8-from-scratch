<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id'     => $user->id,
            'category_id' => $family->id,
            'title'       => 'Family post',
            'slug'        => 'family-post',
            'excerpt'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'body'        => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, cumque adipisci assumenda omnis voluptates ipsum sit laborum perferendis aspernatur quod iusto, tenetur accusamus, accusantium recusandae sint. Voluptatem ab in non.</p>'
        ]);

        Post::create([
            'user_id'     => $user->id,
            'category_id' => $personal->id,
            'title'       => 'Personal post',
            'slug'        => 'personal-post',
            'excerpt'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'body'        => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, cumque adipisci assumenda omnis voluptates ipsum sit laborum perferendis aspernatur quod iusto, tenetur accusamus, accusantium recusandae sint. Voluptatem ab in non.</p>'
        ]);

        Post::create([
            'user_id'     => $user->id,
            'category_id' => $work->id,
            'title'       => 'Work post',
            'slug'        => 'work-post',
            'excerpt'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'body'        => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, cumque adipisci assumenda omnis voluptates ipsum sit laborum perferendis aspernatur quod iusto, tenetur accusamus, accusantium recusandae sint. Voluptatem ab in non.'
        ]);
    }
}
