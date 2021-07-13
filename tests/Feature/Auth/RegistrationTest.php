<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test that the registration page returns a 200.
     *
     * @return void
     */
    public function testRegistrationPageIsSuccessful()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * Test that a candidate can successfully register.
     *
     * @return void
     */
    public function testCandidateCanRegisterSuccessfully()
    {
        $response = $this->post('/register', [
            'user_type' => 'candidate',
            'forename' => 'John',
            'surname' => 'Doe',
            'bio' => 'Lorem ipsum...',
            'address_1' => '123',
            'address_2' => 'Rodeo Drive',
            'city' => 'Beverly Hills',
            'state' => 'California',
            'postcode' => 'CAL123',
            'country' => 'US',
            'email' => 'john@test.com',
            'password' => 'testing123',
            'password_confirmation' => 'testing123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'username' => 'JoDoe',
        ]);

        $this->assertDatabaseHas('candidates', [
            'forename' => 'John',
            'surname' => 'Doe',
        ]);

        $user = User::find(1);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test that a recruiter can successfully register.
     *
     * @return void
     */
    public function testRecruiterCanRegisterSuccessfully()
    {
        $response = $this->post('/register', [
            'user_type' => 'recruiter',
            'forename' => 'John',
            'surname' => 'Doe',
            'bio' => 'Lorem ipsum...',
            'company_name' => 'Fake Company',
            'company_registered_name' => 'Fake Company, Inc.',
            'company_email' => 'fake@test.com',
            'company_phone' => '0123900000',
            'company_url' => 'www.fake.com',
            'address_1' => '123',
            'address_2' => 'Rodeo Drive',
            'city' => 'Beverly Hills',
            'state' => 'California',
            'postcode' => 'CAL123',
            'country' => 'US',
            'email' => 'john@test.com',
            'password' => 'testing123',
            'password_confirmation' => 'testing123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'username' => 'JoDoe',
        ]);

        $this->assertDatabaseHas('recruiters', [
            'forename' => 'John',
            'surname' => 'Doe',
        ]);

        $this->assertDatabaseHas('companies', [
            'name' => 'Fake Company',
            'url' => 'www.fake.com',
        ]);

        $user = User::find(1);

        $this->assertAuthenticatedAs($user);
    }
}
