<?php

namespace App\Http\Controllers\Cms\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageRequest;
use App\Services\Cms\Image\ImageService;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function upload(ImageRequest $request): JsonResponse
    {
        $file = $request->file('file');
        $album = $this->imageService->createAlbum($request->get('album'));
        $this->imageService->upload($file, $album->id);

        return response()->json(['message' => 'created'], 201);
    }


}
