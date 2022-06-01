<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Services\User\UserService;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends Controller
{
    protected  $accessTokenController;
    protected  $userService;

    public function __construct(AccessTokenController $accessTokenController, UserService $userService)
    {
        $this->accessTokenController = $accessTokenController;
        $this->userService = $userService;
    }

    public function Authlogin(ServerRequestInterface $request)
    {
        return $this->accessTokenController->issueToken($request);
    }

    public function register(UserStoreRequest $userStoreRequest)
    {
        return $this->userService->storeUser($userStoreRequest->validated());
    }

    public function login(UserLoginRequest $userLoginRequest)
    {
        return $this->userService->login($userLoginRequest->validated());
    }
}
