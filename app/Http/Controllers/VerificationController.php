<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /**
     * Verification user email after registration
     * @param EmailVerificationRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function notice()
    {
//        return view();
    }

    public function checkAuthUser()
    {
        if(Auth::check()){
            return [
                'email' => Auth::user()->email,
                'phone_number' => Auth::user()->phone_number,
                'name' => Auth::user()->name,
            ];
        }else{
            return false;
        }
    }
}
