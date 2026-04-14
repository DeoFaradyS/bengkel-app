<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Deo',
            'email' => 'deo@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // cek user masuk database
        $this->assertDatabaseHas('users', [
            'email' => 'deo@test.com'
        ]);

        // harus redirect ke dashboard user
        $response->assertRedirect(route('user.dashboard'));

        // auto login
        $this->assertAuthenticated();
    }

    public function test_register_fails_if_data_invalid()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'salah-format',
            'password' => '123',
            'password_confirmation' => 'beda',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'password'
        ]);

        $this->assertGuest();
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        // redirect ke dashboard user
        $response->assertRedirect(route('user.dashboard'));
    }

    public function test_admin_redirected_to_admin_dashboard()
    {
        $admin = User::factory()->create([
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        // redirect ke dashboard admin
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_login_fails_with_wrong_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password')
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'salah',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_fails_if_validation_error()
    {
        $response = $this->post('/login', [
            'email' => 'bukan-email',
            'password' => '',
        ]);

        $response->assertSessionHasErrors([
            'email',
            'password'
        ]);

        $this->assertGuest();
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}