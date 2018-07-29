<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Laravel\Passport\Passport;

class SongApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldGetSongs()
    {
        factory(\App\Song::class)->create();

        Passport::actingAs(factory(User::class)->create());

        $response = $this->get('/api/songs');

        $response->assertStatus(200);
    }
}
