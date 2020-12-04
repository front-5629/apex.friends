<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'people_id' => '4',
            'headware' => 'pc',
            'mainpic' => 'octane',
            'secondpic' => 'mirage',
            'thirdpic' => 'crypto',
            'require_rank' => 'dia',
            'voice_chat' => '1',
            'message' => '固定でマスター目指しましょう！',
            'psid' => 'yamada'
        ];
        $post = new Post;
        $post->fill($param)->save();

        $param = [
            'people_id' => '5',
            'headware' => 'ps4',
            'mainpic' => 'mirage',
            'secondpic' => 'crypto',
            'thirdpic' => 'octane',
            'require_rank' => 'plat',
            'voice_chat' => '0',
            'message' => 'まったり',
            'psid' => 'tanaka'
        ];
        $post = new Post;
        $post->fill($param)->save();
    }
}

