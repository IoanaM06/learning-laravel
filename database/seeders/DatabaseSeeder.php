<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);

        Post::create([
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>This is a post about my work!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicingelit. Consequuntur asperiores totam laudantium assumenda blanditiis aliquid minus debitis esse nostrum magnam necessitatibus perspiciatis, ex ipsum quod ratione beatae facilis quae! Labore, nihil! Nihil aspernatur sequi repudiandae quaerat quisquam ipsam, tempora earum totam deleniti cumque placeat aliquid accusamus sint vitae iure atque, veniam sed alias omnis animi? Quaerat nihil facilis tempore modi, eaque similique enim? Rem voluptas repellat soluta quaerat, adipisci iusto aspernatur doloremque laudantium architecto nemo praesentium, laborum voluptates veniam delectus debitis perferendis vel tenetur possimus reiciendis ipsam voluptate obcaecati. Adipisci eos soluta culpa id asperiores? Eius aliquid illo nisi velit!</p>',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'This is a post about my work!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicingelit. Consequuntur asperiores totam laudantium assumenda blanditiis aliquid minus debitis esse nostrum magnam necessitatibus perspiciatis, ex ipsum quod ratione beatae facilis quae! Labore, nihil! Nihil aspernatur sequi repudiandae quaerat quisquam ipsam, tempora earum totam deleniti cumque placeat aliquid accusamus sint vitae iure atque, veniam sed alias omnis animi? Quaerat nihil facilis tempore modi, eaque similique enim? Rem voluptas repellat soluta quaerat, adipisci iusto aspernatur doloremque laudantium architecto nemo praesentium, laborum voluptates veniam delectus debitis perferendis vel tenetur possimus reiciendis ipsam voluptate obcaecati. Adipisci eos soluta culpa id asperiores? Eius aliquid illo nisi velit!</p>',
            'category_id' => 2,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => 'My Hobby Post',
            'slug' => 'my-hobby-post',
            'excerpt' => 'This is a post about my work!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicingelit. Consequuntur asperiores totam laudantium assumenda blanditiis aliquid minus debitis esse nostrum magnam necessitatibus perspiciatis, ex ipsum quod ratione beatae facilis quae! Labore, nihil! Nihil aspernatur sequi repudiandae quaerat quisquam ipsam, tempora earum totam deleniti cumque placeat aliquid accusamus sint vitae iure atque, veniam sed alias omnis animi? Quaerat nihil facilis tempore modi, eaque similique enim? Rem voluptas repellat soluta quaerat, adipisci iusto aspernatur doloremque laudantium architecto nemo praesentium, laborum voluptates veniam delectus debitis perferendis vel tenetur possimus reiciendis ipsam voluptate obcaecati. Adipisci eos soluta culpa id asperiores? Eius aliquid illo nisi velit!</p>',
            'category_id' => 3,
            'user_id' => 1,
        ]);
    }
}
