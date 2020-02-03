<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function find($userID);

    public function delete($userID);

    public function getAll();

    public function update($user, $userData);

}