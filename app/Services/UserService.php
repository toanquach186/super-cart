<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;
    private CartRepository $cartRepository;

    public function __construct(UserRepository $userRepository, CartRepository $cartRepository)
    {
        $this->userRepository = $userRepository;
        $this->cartRepository = $cartRepository;
    }

    public function viewAllCart($id): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->cartRepository->viewAllCart($id);
    }
}
