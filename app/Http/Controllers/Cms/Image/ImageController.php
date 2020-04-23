<?php

namespace App\Http\Controllers\Cms\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageRequest;
use App\Services\Cms\Image\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        $files = $request->allFiles();
        $albumId = $this->imageService->upload($files, $request->get('album'));

        return response()->json(['message' => 'created', 'data' => ['albumId' => $albumId]], 201);
    }


}
