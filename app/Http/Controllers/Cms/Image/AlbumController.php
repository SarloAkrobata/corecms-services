<?php

namespace App\Http\Controllers\Cms\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\AlbumRequest;
use App\Http\Resources\Image\CmsAlbumResource;
use App\Services\Cms\Image\AlbumService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumController extends Controller
{
    private $cmsAlbumService;

    public function __construct(AlbumService $cmsAlbumService)
    {
        $this->cmsAlbumService = $cmsAlbumService;
    }


    /**
     * @param AlbumRequest $request
     * @return JsonResponse
     */
    public function store(AlbumRequest $request): JsonResponse
    {
        if (!$this->cmsAlbumService->createAlbum($request->all())) {
            return response()->json(['error' => 'not created']);
        }

        return response()->json(['message' => 'created'], 201);
    }

    /**
     * @param $id
     * @param AlbumRequest $request
     * @return JsonResponse
     */
    public function update($id, AlbumRequest $request): JsonResponse
    {
        if (!$this->cmsAlbumService->updateAlbum($id, $request->all())) {
            return response()->json(['error' => 'not updated']);
        }

        return response()->json(['message' => 'updated'], 200);
    }

    /**
     * @param $albumId
     * @return CmsAlbumResource
     */
    public function show($albumId): CmsAlbumResource
    {
        return CmsAlbumResource::make($this->cmsAlbumService->getAlbum($albumId));
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CmsAlbumResource::collection($this->cmsAlbumService->getAllAlbums());
    }

    /**
     * @param $albumId
     * @return JsonResponse
     */
    public function delete($albumId): JsonResponse
    {
        if (!$this->cmsAlbumService->deleteAlbum($albumId)) {
            return response()->json(['error' => 'not deleted']);
        }

        return response()->json(['message' => 'deleted'], 200);
    }

    /**
     * @param AlbumRequest $request
     * @return JsonResponse
     */
    public function storeAndReturnId(AlbumRequest $request): JsonResponse
    {
        $albumId = $this->cmsAlbumService->createAlbumAndReturnId($request->all());
        if ($albumId === 0) {
            return response()->json(['error' => 'not created']);
        }

        return response()->json(['message' => 'created', 'album_id' => $albumId], 201);
    }

}
