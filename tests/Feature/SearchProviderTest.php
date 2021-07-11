<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\SearchProvider;

class SearchProviderTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->searchProvider = new SearchProvider;
    }

    /**
     * Checks that the search provider returns the correct number of results.
     *
     * @return void
     */
    public function testUserSearchReturnsFourResults()
    {
        $input = [
            'search' => 'Amazon'
        ];

        $result = $this->searchProvider->create($input);

        $this->assertEquals(4, count($result));
    }

    /**
     * Checks that the search provider returns the correct results.
     *
     * @return void
     */
    public function testUserSearchReturnsCorrectResults()
    {
        $input = [
            'search' => 'Software Engineer'
        ];

        $result = $this->searchProvider->create($input);

        $this->assertEquals('Software Engineer', $result[0]->title);
        $this->assertEquals('Senior Software Engineer', $result[1]->title);
        $this->assertEquals(8, count($result));
    }

    /**
     * Checks that the search provider is case insensitive.
     *
     * @return void
     */
    public function testUserSearchIsCaseInsensitive()
    {
        $input = [
            'search' => 'SoFtWaRe ENGineer'
        ];

        $result = $this->searchProvider->create($input);

        $this->assertEquals('Software Engineer', $result[0]->title);
        $this->assertEquals('Senior Software Engineer', $result[1]->title);
        $this->assertEquals(8, count($result));
    }
    
    /**
     * Checks that the search provider returns all results when input is empty.
     * 
     * @return void
     */
    public function testEmptyUserSearchReturnsAllAdverts()
    {
        $input = [
            'search' => ''
        ];

        $result = $this->searchProvider->create($input);

        $this->assertEquals(16, count($result));
    }
}
