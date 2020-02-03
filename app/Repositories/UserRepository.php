<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    public function find($userID)
    {
        return User::find($userID);
    }

    public function getAll()
    {
        return User::get();
    }

    public function delete($userID)
    {
        return User::destroy($userID);
    }

    public function update($userID, $userData)
    {
        return User::where('user_id', $userID)->update($userData);
    }
}