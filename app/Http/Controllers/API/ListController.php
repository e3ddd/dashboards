<?php

namespace App\Http\Controllers\API;

use App\Services\PixelImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends ListSwaggerController
{
    public function getPixel(Request $request)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        return $pixelImageService->getUserPixels($request->user()->id);
    }

    public function createPixel(Request $request)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        $pixelImageService->createPixel($request->user()->id);
    }

    public function deletePixel(Request $request)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        $pixelImageService->deletePixel($request->pixelId);
    }

    public function updatePixel(Request $request)
    {

    }
}
