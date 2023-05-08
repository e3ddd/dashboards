<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegistrationRepository
{

    /**
     * Sign up
     * @param string|null $email
     * @param string|null $name
     * @param string|null $phoneNumber
     * @param string|null $password
     * @param string|null $userPixel
     * @return void
     */
    public function signUp($email, $name, $phoneNumber, $password)
    {
        if ($email === null) {
            throw new \RuntimeException('Email required !');
        }

        if ($name === null) {
            throw new \RuntimeException('Name required !');
        }

        if ($phoneNumber === null) {
            throw new \RuntimeException('Phone number required !');
        }

        if ($password === null) {
            throw new \RuntimeException('Password required !');
        }

        $user = new User();

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->name = $name;
        $user->phone_number = $phoneNumber;

        $user->save();

        Auth::login($user);

        event(new Registered($user));
    }
}
