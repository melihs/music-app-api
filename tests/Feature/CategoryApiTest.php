<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Laravel\Passport\Passport;

class CategoryApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldCategoriesWithToken()
    {
        factory(\App\Category::class)->create();
        
        Passport::actingAs(factory(User::class)->create());        
    
        $response = $this->get('/api/categories');
    
    
        $response->assertStatus(200);
    }
}
