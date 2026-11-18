<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_endpoint_responds(): void
    {
        $this->get('/up')->assertStatus(500);
    }

    public function test_a_user_can_be_stored(): void
    {
        User::factory()->create(['email' => 'l@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'l@example.com']);
    }
}
