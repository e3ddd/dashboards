<?php

namespace App\Http\Controllers\API;

use App\Services\PixelImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends ListSwaggerController
{
    /**
     * @OA\Get(
     *      path="/pixels",
     *      operationId="getPixelsList",
     *      tags={"Pixels"},
     *      summary="Get list of pixels",
     *      description="Returns list of pixels",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GetPixelResource"),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *      )
     *     )
     */
    public function getPixel(Request $request)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        return $pixelImageService->getUserPixels($request->user()->id);
    }

    /**
     * @OA\Get(
     *      path="/pixel/create",
     *      operationId="createPixel",
     *      tags={"Pixels"},
     *      summary="Create pixel",
     *      description="Create pixel",
     *       @OA\Parameter(
     *          name="User id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful created pixel",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     ),
     */
    public function createPixel(Request $request)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        $pixelImageService->createPixel($request->user()->id);
    }

    /**
     * @OA\Delete(
     *      path="/pixel/delete/{pixelId}",
     *      operationId="deletePixel",
     *      tags={"Pixels"},
     *      summary="Delete pixel",
     *      description="Delete pixel",
     *      @OA\Parameter(
     *          name="pixelId",
     *          description="Pixel id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful deleted pixel",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *      ),
     *     ),
     */
    public function deletePixel($pixelId)
    {
        /** @var PixelImageService $pixelImageService */
        $pixelImageService = app(PixelImageService::class);
        $pixelImageService->deletePixel($pixelId);
    }

    public function updatePixel(Request $request)
    {

    }
}
