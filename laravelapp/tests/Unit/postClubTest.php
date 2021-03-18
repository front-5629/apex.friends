<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Club;

class postClubTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testPostClub()
    {
        factory(Club::class)->create([
            'people_id' => 1,
            'clubs_name' => 'aaa',
            'clubs_member' => 1,
            'clubs_headware' => 'PS4',
            'require_rank' => 'プラチナ1',
            'message' => 'hello',
            'voice_chat' => 1
        ]);
        factory(Club::class, 10)->create();

        $this->assertDatabaseHas()


    }
}
