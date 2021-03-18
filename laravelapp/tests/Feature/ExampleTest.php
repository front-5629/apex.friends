<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelloTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHello()
    {
        $this->assertTrue(true);

        $respose = $this->get('/');
        $respose->assertStatus(200);


        $respose = $this->get('/no_route');
        $respose->assertStatus(404);
    }
}
