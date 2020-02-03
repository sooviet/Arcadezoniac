<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * Test for getting all users
     *
     * @return void
     */
    public function testGetAllUsers()
    {
        $response = $this->json('GET', '/api/v1/users');

        $response
            ->assertResponseStatus(200);
    }

    /**
     * Test for fetching user detail
     *
     * @return void
     */
    public function testFetchUser()
    {
        $response = $this->json('GET', '/api/v1/user/1');

        $this->assertJson(json_encode([
            'data' => \App\User::find(1)
        ]));

        $response
            ->assertResponseStatus(200);
    }

    /**
     * Test for updating user detail
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $postData = [
            'name' => 'Davry',
            'address' => 'ABC Street'
        ];

        $response = $this->json('PUT', '/api/v1/user/1', $postData);

        $this->assertJson(json_encode([
            'message' => 'User Updated'
        ]));

        $response
            ->assertResponseStatus(200);

    }

    /**
     * Test for creating user
     *
     * @return void
     */
    public function testCreateUser()
    {
        $postData = [
            'name' => 'Devon Mark',
            'address' => 'ABC Street',
            'email' => 'abc@test.com',
            'role_id' => 2,
        ];

        $response = $this->json('POST', '/api/v1/user', $postData);

        $response
            ->assertResponseStatus(200);

        $this->assertJson(json_encode([
            'message' => 'User Created'
        ]));
    }
}
