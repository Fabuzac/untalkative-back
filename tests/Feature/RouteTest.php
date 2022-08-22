<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_picture_access()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

    }
}

// assertTrue()
// assertFalse()
// assertEquals()
// assertNull()
// assertContains()
// assertCount()
// assertEmpty()