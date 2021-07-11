<?php

namespace Tests\Feature;

use App\Services\SearchProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use stdClass;
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
     * Test that the home page is returned successfully.
     *
     * @return void
     */
    public function testHomePageIsSuccessful()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that the search page is returned successfully.
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
}
