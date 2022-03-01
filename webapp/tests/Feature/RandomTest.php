<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RandomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/random/20');
        
        $response->dump(); exit;
        $response->assertStatus(200)
            ->assertExactJson([
            'message' => 'ok',
        ]);
    }
}
