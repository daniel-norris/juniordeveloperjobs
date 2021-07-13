<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'password' => Hash::make('testing123'),
        ]);
    }

    /**
     * Test that the login page returns a 200.
     *
     * @return void
     */
    public function testLoginPageIsSuccessful()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Test that the user is redirected from the login page if already authenticated.
     * 
     * @return void
     */
    public function testUserRedirectedIfAuthenticated()
    {
        $response = $this->actingAs($this->user)->get('/login');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    /**
     * Test that the user cannot login with an incorrect password.
     * 
     * @return void
     */
    public function testUserCannotLoginWithIncorrectPassword()
    {       
        $response = $this->from('/login')->post('/login', [
            'email' => $this->user->email,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * Test that a user can login and authenticate successfully.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'testing123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($this->user);
    }

    /** 
     * Test that when a user logs out the session is flushed successfully.
     * 
     * @return void
     */
    public function testUserCanLogout()
    {
        $session = session()->getId();

        $response = $this->actingAs($this->user)->post('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertNotEquals($session, session()->getId());
    }
}
