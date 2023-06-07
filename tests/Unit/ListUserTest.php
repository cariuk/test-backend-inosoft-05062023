<?php

namespace Tests\Unit;

use Tests\TestCase;

class ListUserTest extends LoginSuccessTest
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example(): void
    {
        parent::test_example();

        $response = $this->get('api/user/list', [
            'Authorization' => 'Bearer ' . $this->token,
        ])->assertStatus(200)->assertJsonStructure([
            'meta' => [
                'status',
                'description',
            ],
            'data' => [
                '*' => [
                    '_id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at'
                ]
            ],
            'pagination' => [
                'total',
                'per_page',
                'current_page',
                'last_page',
                'from',
                'to'
            ]
        ]);

    }
}
