<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'psid' => 'yamada',
            'headware' => 'pc',
            'mainpic' => 'octane',
            'secondpic' => 'mirage',
            'thirdpic' => 'crypto',
            'rank' => 'dia',
            'message' => 'ランクに行く仲間募集中です！！',
            'email' => 'aaa@gmail.com',
        ];
        DB::table('people')->insert($param);

        $param = [
            'psid' => 'tanaka',
            'headware' => 'ps4',
            'mainpic' => 'mirage',
            'secondpic' => 'octane',
            'thirdpic' => 'crypto',
            'rank' => 'plat',
            'message' => '雰囲気良くデキる人募集',
            'email' => 'bbb@gmail.com',
        ];
        DB::table('people')->insert($param);
        
        $param = [
            'psid' => 'sato',
            'headware' => 'pc',
            'mainpic' => 'mirage',
            'secondpic' => 'crypto',
            'thirdpic' => 'octane',
            'rank' => 'gold',
            'message' => '初心者ですがよろしくおねがいします',
            'email' => 'ccc@gmail.com',
        ];
        DB::table('people')->insert($param);
    }
}
