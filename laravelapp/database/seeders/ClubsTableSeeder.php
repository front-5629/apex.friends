<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'psid' => 'yahoo',
            'headware' => 'pc',
            'mainpic' => 'octane',
            'secondpic' => 'mirage',
            'thirdpic' => 'crypto',
            'rank' => 'dia',
            'message' => 'ランクに行く仲間募集中です！！',
            'email' => 'aaa@gmail.com',
        ];
        $person = new Person;
        $person->fill($param)->save();
    }
}
