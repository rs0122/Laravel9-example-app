<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tweet;
use App\Models\Image;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //開発用ダミーデータの作成(Factoryの不使用)
        // DB::table('tweets')->insert([
            // 'content' => Str::random(100),
            // 'created_at' => now(),
            // 'updated_at' => now()
        // ]);

        Tweet::factory()->count(5)->create()->each(fn($tweet) =>
            Image::factory()->count(2)->create()->each(fn($image) =>
                $tweet->images()->attach($image->id)
            )
        );

        // Image::factory()->count(2)->create();
    }
}
