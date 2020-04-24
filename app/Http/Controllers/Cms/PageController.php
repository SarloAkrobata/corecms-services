<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Http\Resources\Page\CmsPageResource;
use App\Services\Frontend\PageService;
use App\Services\Cms\Page\PageService as CmsPageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    private $pageService;
    private $cmsPageService;

    public function __construct(PageService $pageService, CmsPageService $cmsPageService)
    {
        $this->pageService = $pageService;
        $this->cmsPageService = $cmsPageService;
    }

    public function getMenu($slug = 'home')
    {
        $data = $this->pageService->getAllData($slug);

        $nav = [];
        foreach ($data['nav'] as $key => $item) {
            if ($key==='home') continue;
        }
        return response()->json($nav['nav']);
    }

    /**
     * @param PageRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(PageRequest $request): JsonResponse
    {
        if (!$this->cmsPageService->createPage($request->all())) {
            return response()->json(['error' => 'not created']);
        }

        return response()->json(['message' => 'created'], 201);
    }

    /**
     * @param $id
     * @param PageRequest $request
     * @return JsonResponse
     */
    public function update($id, PageRequest $request): JsonResponse
    {
        if (!$this->cmsPageService->updatePage($id, $request->all())) {
            return response()->json(['error' => 'not updated']);
        }

        return response()->json(['message' => 'updated'], 200);
    }

    /**
     * @param $pageId
     * @return CmsPageResource
     */
    public function show($pageId): CmsPageResource
    {
        return CmsPageResource::make($this->cmsPageService->getPage($pageId));
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CmsPageResource::collection($this->cmsPageService->getAllPages());
    }

    /**
     * @param $pageId
     * @return JsonResponse
     */
    public function delete($pageId): JsonResponse
    {
        if (!$this->cmsPageService->deletePage($pageId)) {
            return response()->json(['error' => 'not deleted']);
        }

        return response()->json(['message' => 'deleted'], 200);
    }

    public function getLayouts()
    {
        $dir    = base_path('resources/views/theme/layout');
        $files = File::files($dir);
        $layouts = [];
        foreach ($files as $file) {
            $fileName = explode('.',$file->getFilenameWithoutExtension());
            $layouts[] = $fileName[0];

        }
        return response()->json(['layouts' => $layouts]);
    }


}
