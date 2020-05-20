<?php

namespace App\Services\Frontend;

use App\Repositories\Frontend\Contracts\PageRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class PageService
{
    private $pageRepository;
    private $routeService;

    public function __construct(PageRepositoryInterface $pageRepository, RouteService $routeService)
    {
        $this->routeService = $routeService;
        $this->pageRepository = $pageRepository;
    }

    public function getAllData($slug)
    {
        $nav = [];
        foreach ($this->routeService->getAllRoutes() as $route) {
            $nav[$route['position']][] = $route;
        }

        return [
            'data' => $this->routeService->getRequestedRouteData($slug),
            'nav' => $nav,
        ];
    }

    public function createPage()
    {

    }
}
