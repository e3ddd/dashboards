<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
}
