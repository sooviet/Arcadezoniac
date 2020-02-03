<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'role_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|required',
        'email' => 'email|required|unique:users',
        'address' => 'required',
        'role_id' => 'required|integer',
    ];

    public static function getRules($type, $userID = null) {

        $rules = self::$rules;

        switch ($type) {
            CASE 'update':
                $rules ['email'] = 'email|unique:users,email,' . (int)$userID;
                break;

        }

        return $rules;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
