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

    /**
     * Show all statistic dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function allStatisticDashboardShow()
    {
        return view('Dashboards.allStatisticDashboardLayout');
    }

    /**
     * Show create pixel page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function createPixelShow()
    {
        return view('CreatePixel.layout');
    }

    /**
     * Show create token page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function crateTokenShow()
    {
        return view('CreateToken.layout');
    }
}
