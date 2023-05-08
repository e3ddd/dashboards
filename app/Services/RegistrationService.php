<?php

namespace App\Services;

use App\Repositories\RegistrationRepository;
use Illuminate\Support\Str;

class RegistrationService
{
    private RegistrationRepository $registrationRepository;

    public function __construct(RegistrationRepository $registrationRepository)
    {
        $this->registrationRepository = $registrationRepository;
    }

    /**
     * Sign up user
     * @param string|null $email
     * @param string|null $name
     * @param string|null $phoneNumber
     * @param string|null $password
     * @param string|null $confirmPassword
     * @return void
     */
    public function signUp($email, $name, $phoneNumber, $password, $confirmPassword)
    {
        if($password !== $confirmPassword){
            throw new \RuntimeException('Passwords don\'t match !');
        }

        $this->registrationRepository->signUp($email, $name, $phoneNumber, $password);
    }
}
