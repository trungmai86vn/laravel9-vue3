<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_image()
    {
        $response = $this->get('/api/search');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'hits',
            'total',
            'totalHits'
        ]);
    }
}
