<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Club;

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
            'people_id' => '3',
            'clubs_name' => 'トリコ',
            'clubs_member' => '10',
            'clubs_headware' => 'ps4',
            'require_rank' => 'gold',
            'voice_chat' => '0',
            'message' => 'カジュアル、ランク問わずまったりやりましょう',
        ];
        $club = new Club;
        $club->fill($param)->save();
    }
}
