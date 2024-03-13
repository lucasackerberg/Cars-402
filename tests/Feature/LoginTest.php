<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{

   use RefreshDatabase;

    public function test_login_view_has_required_elements()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('402 Street Swagger Customs'); // Ensure the company name is present
        $response->assertSeeText('Login');
        $response->assertViewHas('errors'); 

        // You may add more specific assertions based on your requirements and dynamic data
    }

    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Mr Robot3';
        $user->email = 'example@robot.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@robot.se',
                'password' => '123',
            ]);

        $response->assertStatus(200);
    } 


}
