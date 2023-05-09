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
    public function checkPixel($userPixel, $ip)
    {
        return $this->pixelImageRepository->checkPixel($userPixel, $ip);
    }

    /**
     * Create pixel ID
     * @param integer|null $userId
     */
    public function createPixel($userId)
    {
        $this->pixelImageRepository->createPixel($userId);
    }

    /**
     * Get user pixel IDS
     * @param integer|null $userId
     * @return mixed
     */
    public function getUserPixels($userId)
    {
        return $this->pixelImageRepository->getUserPixels($userId);
    }

    /**
     * Delete pixel by id
     * @param integer|null $pixelId
     * @return void
     */
    public function deletePixel($pixelId)
    {
        $this->pixelImageRepository->deletePixel($pixelId);
    }
}
