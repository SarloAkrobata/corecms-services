<?php

namespace App\Http\Controllers\Cms\Image;

use App\Factory\CmsPage\CmsPageFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Services\Frontend\PageService;
use App\Services\Cms\Page\PageService as CmsPageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
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

    public function upload(Request $request): JsonResponse
    {
        if (!$this->cmsPageService->createPage($request->all())) {
            return response()->json(['error' => 'not created']);
        }

        return response()->json(['message' => 'created'], 201);
    }


}
