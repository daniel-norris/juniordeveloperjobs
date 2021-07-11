<?php

namespace Tests\Controllers\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /**
     * Test that the home page returns a 200.
     *
     * @return void
     */
    public function testHomePageIsSuccessful()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that the search page returns a 200.
     * 
     * @return void
     */
    public function testSearchPageIsSuccessful()
    {
        $response = $this->get('/search', [
            'search' => 'Amazon'
        ]);
        
        $response->assertStatus(200);
    }

    /**
     * Test that the search page returns a view with the correct data successfully.
     * 
     * @return void
     */
    public function testSearchControllerViewIsCorrect()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/search', [
            'search' => 'Amazon'
        ]);

        $response->assertViewHas('adverts');
    }
}
