<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic auth example.
     *
     * @return void
     */
    public function test_should_success_auth_test()
    {
        $this->artisan('passport:client', ['--password' => null, '--no-interaction' => true]);

        // create user
        factory(User::class)->create([
            'email' => 'user@example.com',
            'password' => bcrypt('example')
        ]);

        // fetch client for id and secret
        $client = \DB::table('oauth_clients')->where('password_client', 1)->first();

        $this->post('/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => 'user@example.com',
            'password' => 'example',
            'scope' => ''
        ])->assertJsonStructure(['access_token', 'refresh_token']);
    }
}
