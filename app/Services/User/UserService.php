<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\Service;
use Illuminate\Support\Facades\Auth;

class UserService extends Service
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function storeUser($data)
    {
        $model = $this->get()->where('email', $data['email'])->first();
        if (!$model) {
            $data['password'] = bcrypt($data['password']);
            return $this->store($data);
        } else return response()->json(['message' => 'Email already exists'], 422);

    }


    public function login($data)
    {

        if (!Auth::attempt($data)) return response( )->json(['message' => 'Invalid credentials'], 401);
        else {
            $user = auth()->user();
            $msg = 'login was successful';
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(compact('user', 'msg', 'token'));
        }
    }
}
