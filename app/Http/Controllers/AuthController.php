<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function onLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->authService->Login($request);
    }

    public function onRegister(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->authService->register($request);
    }


    public function logout(): \Illuminate\Http\JsonResponse
    {
        return$this->authService->logout();
    }
}
