<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function createAccount($postArray){
        return User::create($postArray);
    }
}
