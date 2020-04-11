<?php

namespace App\Http\Controllers\Cms;

use App\Factory\CmsPage\CmsPageFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Services\Frontend\PageService;
use App\Services\Cms\Page\PageService as CmsPageService;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    private $pageService;
    private $cmsPageService;
    private $cmsPageFactory;

    public function __construct(PageService $pageService, CmsPageService $cmsPageService, CmsPageFactory $cmsPageFactory)
    {
        $this->pageService = $pageService;
        $this->cmsPageService = $cmsPageService;
        $this->cmsPageFactory = $cmsPageFactory;
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

    public function update($id, PageRequest $request)
    {
        if (!$this->cmsPageService->updatePage($id, $request->all())) {
            return response()->json(['error' => 'not updated']);
        }

        return response()->json(['message' => 'updated'], 200);
    }

    public function show($pageId)
    {
        return $this->cmsPageFactory->makeResource($this->cmsPageService->getPage($pageId));
    }

    public function index()
    {
        return $this->cmsPageFactory->makeResourceCollection($this->cmsPageService->getAllPages());
    }

    public function delete($pageId)
    {
        if (!$this->cmsPageService->deletePage($pageId)) {
            return response()->json(['error' => 'not deleted']);
        }

        return response()->json(['message' => 'deleted'], 200);
    }

}
