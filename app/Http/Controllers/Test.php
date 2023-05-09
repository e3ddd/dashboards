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
        $referral = PixelGif::where('pixel', 'aee5ab0e-e61c-4262-a08d-21b5300bd0c4')->first()->id;

        $statistic = DB::table('about_users')
            ->select('browser', DB::raw('count(*) as total'))
            ->where('referral', $referral)
            ->groupBy('browser')
            ->get();

        dump($statistic);
    }
}
