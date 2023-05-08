<?php

namespace App\Services;

use App\Repositories\PixelImageRepository;

class PixelImageService
{
    private PixelImageRepository $pixelImageRepository;

    public function __construct(PixelImageRepository $pixelImageRepository)
    {
        $this->pixelImageRepository = $pixelImageRepository;
    }

    /**
     * Check exist pixel in DB
     * @param string|null $userPixel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function checkPixel($userPixel, $ip, $userId)
    {
        return $this->pixelImageRepository->checkPixel($userPixel, $ip, $userId);
    }

    public function getUserPixel($userId)
    {
        return $this->pixelImageRepository->getUserPixel($userId);
    }
}
