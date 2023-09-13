<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    protected $fillabble=['type'];

    //This function fetches all the user types
    public static function getUserType()
    {
        return UserType::get();
    }
}
