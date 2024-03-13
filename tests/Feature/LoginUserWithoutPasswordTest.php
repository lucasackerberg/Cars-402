<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginUserWithoutPasswordTest extends TestCase
{
    public function test_login_user_without_password(): void
    {
        $response = $this->post('/login', [
            'email' => 'user@yrgo.se',
            'password' => '',
        ]);

        //if a user tries to login without a password, they will be redirected back with a 401 response code
        $response->assertStatus(401);      
    }
}
