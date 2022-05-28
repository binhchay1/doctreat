<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->user);
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'name',
            'email',
            'password',
            'role',
            'phone',
            'gender',
            'cmt',
            'dob',
            'status_delete',
            'email_verified_at'
        ], $this->user->getFillable());
    }
}
