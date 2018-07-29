<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use App\User;

class UserApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserShouldAddRemoveGetFavorite()
    {
        $user = Passport::actingAs(factory(User::class)->create());

        $song= factory(\App\Song::class)->create()->first();

        $addFavorite = $this->post('/api/favorite/'.$song->id.'/add');
        $addFavorite->assertStatus(201);

        $volume = $this->post('/api/favorite/'.$song->id.'/volume');
        $volume->assertStatus(201);

        $play = $this->post('/api/favorite/'.$song->id.'/play');
        $play->assertStatus(201);

        $pause = $this->post('/api/favorite/'.$song->id.'/pause');
        $pause->assertStatus(201);

        $removeFavorite = $this->post('/api/favorite/'.$song->id.'/remove');
        $removeFavorite->assertStatus(201);



        $favorites = $this->get('/api/favorites');

        $favorites->assertStatus(200);
    }
}
