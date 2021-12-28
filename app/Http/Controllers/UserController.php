<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function viewAllCart($id): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->userService->viewAllCart($id);
    }
}
