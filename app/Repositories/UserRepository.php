<?php
namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    public function find($userID)
    {
        return User::with('role')->find($userID);
    }

    public function getAll()
    {
        return User::with('role')->get();
    }

    public function delete($userID)
    {
        return User::destroy($userID);
    }

    public function create($userDetail)
    {
        return User::create($userDetail);
    }

    public function update($userID, $userData)
    {
        return User::where('id', $userID)->update($userData);
    }
}