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

        $ip = $request->ip();

        if($ip === '127.0.0.1'){
            $ip = fake()->ipv4;
        }

        if(Auth::check()){
            return $pixelImageService->checkPixel($userPixel, $ip);
        }
    }

    /**
     * Create Pixel ID
     */
    public function createPixel()
    {
        if(Auth::check()){
            /** @var PixelImageService $pixelImageService */
            $pixelImageService = app(PixelImageService::class);
            $pixelImageService->createPixel(Auth::user()->id);
        }else{
            throw new \RuntimeException('You must be logged in');
        }
    }


    /**
     * Get user pixel IDS
     * @return mixed
     */
    public function getUserPixels()
    {
        if(Auth::check()){
            /** @var PixelImageService $pixelImageService */
            $pixelImageService = app(PixelImageService::class);
            return $pixelImageService->getUserPixels(Auth::user()->id);
        }else{
            throw new \RuntimeException('You must be logged in');
        }
    }

    public function deletePixel(Request $request)
    {
        if(Auth::check()){
            /** @var PixelImageService $pixelImageService */
            $pixelImageService = app(PixelImageService::class);
            $pixelImageService->deletePixel($request->pixelId);
        }else{
            throw new \RuntimeException('You must be logged in');
        }
    }

}
