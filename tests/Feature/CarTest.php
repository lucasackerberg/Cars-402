<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Car;

class CarTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateCar()
    {
        // Create test data
        $carData = [
            'brand' => 'Test Brand',
            'model' => 'Test Model',
            'year' => '2022',
            'color' => 'Test Color',
            'registration' => 'ABC123',
            'problem_description' => 'Test problem description',
        ];

        // Send POST request to create a new car
        $response = $this->post('/createCar', $carData);

        // Check if the car was created successfully
        $response->assertStatus(302); // Assuming successful creation redirects to another page
    }
}
