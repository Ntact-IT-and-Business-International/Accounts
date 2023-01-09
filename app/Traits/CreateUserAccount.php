<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait CreateUserAccount
{
    /**
     * this function creates a user
     */
    public static function createAccount($name, $email,$password)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }
}
