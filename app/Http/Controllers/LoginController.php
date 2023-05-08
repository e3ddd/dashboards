<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Authentication user and login
     * @param LoginRequest $request
     * @return string
     */
    public function auth(LoginRequest $request)
    {
        /** @var LoginService $loginService */
        $loginService = app(LoginService::class);
        $loginService->auth($request->email, $request->password, $request->remember);
        return '/';
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
