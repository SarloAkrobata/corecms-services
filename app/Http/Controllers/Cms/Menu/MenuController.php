<?php

namespace App\Http\Controllers\Cms\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuRequest;
use App\Http\Resources\Menu\CmsMenuResource;
use App\Services\Cms\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MenuController extends Controller
{
    private $cmsMenuService;

    public function __construct(MenuService $cmsMenuService)
    {
        $this->cmsMenuService = $cmsMenuService;
    }


    /**
     * @param MenuRequest $request
     * @return JsonResponse
     */
    public function store(MenuRequest $request): JsonResponse
    {
        if (!$this->cmsMenuService->createMenu($request->all())) {
            return response()->json(['error' => 'not created']);
        }

        return response()->json(['message' => 'created'], 201);
    }

    /**
     * @param $id
     * @param MenuRequest $request
     * @return JsonResponse
     */
    public function update($id, MenuRequest $request): JsonResponse
    {
        if (!$this->cmsMenuService->updateMenu($id, $request->all())) {
            return response()->json(['error' => 'not updated']);
        }

        return response()->json(['message' => 'updated'], 200);
    }

    /**
     * @param $menuId
     * @return CmsMenuResource
     */
    public function show($menuId): CmsMenuResource
    {
        return CmsMenuResource::make($this->cmsMenuService->getMenu($menuId));
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CmsMenuResource::collection($this->cmsMenuService->getAllMenu());
    }

    /**
     * @param $menuId
     * @return JsonResponse
     */
    public function delete($menuId): JsonResponse
    {
        if (!$this->cmsMenuService->deleteMenu($menuId)) {
            return response()->json(['error' => 'not deleted']);
        }

        return response()->json(['message' => 'deleted'], 200);
    }

}
