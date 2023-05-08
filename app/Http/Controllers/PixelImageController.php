<?php

namespace App\Http\Controllers;

use App\Models\PageViewStatistic;
use App\Services\PixelImageService;
use App\Services\StatisticService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PixelImageController extends Controller
{
    /**
     * @param string|null $userPixel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function pixelImage($userPixel, Request $request)
    {
        /** @var PixelImageService $pixelImageService
         *  @var StatisticService $statisticService
         *
         */
        $pixelImageService = app(PixelImageService::class);
        $statisticService = app(StatisticService::class);

        $ip = $request->ip();

        if($ip === '127.0.0.1'){
            $ip = fake()->ipv4;
        }


        if(Auth::check()){
            return $pixelImageService->checkPixel($userPixel, $ip, Auth::user()->id);
        }
    }

    public function getUserPixel()
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);

        if(Auth::check()){
            return $pixelImageService->getUserPixel(Auth::user()->id);
        }
    }

}
