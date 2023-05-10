<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 * @OA\Schema(
 *     type="array",
 *     title="GetPixelResource",
 *     description="Pixel resource",
 *     @OA\Items(
 *          @OA\Property(
 *                property="id",
 *                type="integer",
 *                example="1"
 *               ),
 *          @OA\Property(
 *                property="pixel",
 *                type="string",
 *                example="06f5bf20-14b0-4c4a-84ef-8d951d0b2ac3"
 *               ),
 *         @OA\Property(
 *                property="route",
 *                type="string",
 *                example="/pixel/63f058b0-1802-4427-bff1-6ae68c0acbc9/pixel.gif"
 *               ),
 *         @OA\Property(
 *                property="created_at",
 *                type="string",
 *                example="2023-05-10T07:21:53.000000Z"
 *               ),
 *         @OA\Property(
 *                property="updated_at",
 *                type="string",
 *                example="2023-05-10T07:21:53.000000Z"
 *               ),
 *     )
 * )
 */
class GetPixelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pixel' => $this->pixel,
            'url' => route('pixel', ['userPixel' => $this->pixel]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
