<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Response\ResponseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return ResponseService::sendJsonReponse(
                false,
                403,
                ['message' => 'Login error'],
            );
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        return ResponseService::sendJsonReponse(
            true,
            200,
            [],
            [
                'api_token' => $tokenResult->accessToken,
                'user' => $user,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ]
        );
    }
}
