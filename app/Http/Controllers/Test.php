<?php

namespace App\Http\Controllers;

use App\Models\AboutUser;
use App\Models\PixelGif;
use App\Models\User;
use App\Repositories\PixelImageRepository;
use App\Repositories\StatisticRepository;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Mockery\Exception;

class Test extends Controller
{
    public function index(Request $request)
    {
        dd(DB::table('about_users')::distinct()->get());
    }
}
