<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::query()->create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }

        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);

    }
}
