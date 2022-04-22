<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()  : void
    {
        parent::setUp();
        $this->artisan('passport:install');
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
        User::factory()->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testApiClientLoginPassed()
    {
        $data = ['email' => $this->user->email, 'password' => '123456789'];
        $response = $this->json('POST', '/login', $data);
        $response->assertStatus(Response::HTTP_ACCEPTED)->assertJsonStructure(['data']);
    }
}
