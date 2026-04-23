<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    // This trait ensures your database is wiped clean before every test
    use RefreshDatabase;

    /** @test */
    public function test_a_user_can_be_created(): void
    {
        // 1. Prepare the data
        $userData = [
            'name' => 'Davit Osadze',
            'email' => 'davit@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // 2. Act: Send a POST request to your endpoint
        $response = $this->postJson('/api/users', $userData);

        // 3. Assert: Check the HTTP response status (201 Created)
        $response->assertStatus(201);

        // 4. Assert: Check if the user exists in the database
        $this->assertDatabaseHas('users', [
            'email' => 'davit@example.com',
            'name' => 'Davit Osadze',
        ]);
    }
}