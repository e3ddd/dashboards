<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;


class RegistrationController extends Controller
{

    /**
     * Registration
     * @param RegistrationRequest $request
     * @return RegistrationRequest
     */
    public function signUpUser(RegistrationRequest $request)
    {
        /** @var RegistrationService $registrationService */
        $registrationService = app(RegistrationService::class);
        $registrationService->signUp($request->email, $request->name, $request->phoneNumber, $request->password, $request->confirmPassword);
    }
}
