<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginSuccessTest extends TestCase
{
    protected string $token;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example(): void
    {
        $value = [
            'email' => 'user@default.com',
            'password' => '12345678'
        ];

        $response = $this->post('api/login', $value);

        $response->assertStatus(200, 'Login Success')->assertJsonStructure([
            'meta' => [
                'status',
                'description',
            ],
            'data' => [
                'token',
                'user' => [
                    '_id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);

        $this->token = $response->json('data.token');
    }
}
