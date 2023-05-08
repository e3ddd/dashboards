<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexPagesViewController extends Controller
{
    /**
     * Show home page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function homePageShow()
    {
        return view('index');
    }

    /**
     * Show registration form page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function registrationShow()
    {
        return view('Registration.layout');
    }

    /**
     * Show login form page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function loginShow()
    {
        return view('Login.layout');
    }
}
