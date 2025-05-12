<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory()->create([
        //     'title' => fake()->sentence(),
        //     'likes' => fake()->numberBetween(1,1000)
        // ]);


        // Post::create([
        //     'title' => 'the last warrior',
        //     'likes' => 100
        // ]);

        // DB::table('posts')->insert([
        //     ['title' => 'the testing method', 'likes' => 33],
        //     ['title' => 'the testing 2 method', 'likes' => 100],
        // ]);

        // $records = collect([
        //     ['title' => 'testing 1', 'likes' => 12],
        //     ['title' => 'testing 2', 'likes' => 122],
        //     ['title' => 'testing 3', 'likes' => 123],
        //     ['title' => 'testing 4', 'likes' => 124],
        //     ['title' => 'testing 5', 'likes' => 1245]
        // ]);
        // $json = File::get(path: 'database/json/records.json');
        // $records = collect(json_decode($json));
        // $records->each(function($record){
        //     Post::create([
        //         'title' => $record->title,
        //         'likes' => $record->likes
        //     ]);
        // });
        for($i =0 ; $i <10; $i++){
            Post::create([
                'title' => fake()->sentence(),
                'likes' => fake()->numberBetween(1,1000),
            ]);
        }
    }
}
