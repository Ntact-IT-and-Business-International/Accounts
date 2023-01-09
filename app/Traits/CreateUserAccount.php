<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait CreateUserAccount
{
    /**
     * this function creates a user
     */
    public static function createAccount($name, $email,$password, $current_photo)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'profile_photo_path' => $current_photo,
        ]);
    }
}
