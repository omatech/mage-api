<?php

namespace Omatech\Mage\Api\Controllers\Auth;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Omatech\Mage\Api\Contracts\Requests\Auth\LoginRequestInterface;
use Omatech\Mage\Api\Controllers\Controller;
use Omatech\Mage\Api\Domains\Users\User;
use Omatech\Mage\Core\Mage;

class LoginController extends Controller
{
    public function login(LoginRequestInterface $request)
    {
        $data = $request->validated();

        dd(Mage::domain('Users'));
        $user = Mage::domain('Users')::find(1);

        dd($user->createAccessToken());

        dd(Hash::check($data['password'], $user->getPassword()));

        $attempt = dd(Auth::guard('mage')->attempt([
            'email'     => $data['email'],
            'password'  => $data['password'],
        ]));

        /*->validateUser([

        ]);

        if (! $attempt) {
            return response()->json([
                'msg' => '',
            ], 401);
        }

        $user = auth()->guard('mage')->user();

        $tokenResult = $user->createToken('Mage Access Token');
        $token = $tokenResult->token;

        if ($data['remember_me']) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);*/
    }
}
