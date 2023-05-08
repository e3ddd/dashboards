<?php

namespace App\Services;

use App\Repositories\LoginRepository;

class LoginService
{
    private LoginRepository $loginRepository;

    public function __construct(LoginRepository $loginRepository,)
    {
        $this->loginRepository = $loginRepository;
    }

    /**
     * Authentication user and login
     * @param string|null $userEmail
     * @param string|null $userPassword
     * @param string|null $remember
     * @return void
     */
    public function auth($userEmail, $userPassword, $remember)
    {
        if($this->loginRepository->authentication($userEmail, $userPassword, $remember)){
            session()->regenerate();
        }
    }
}
