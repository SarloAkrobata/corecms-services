<?php

namespace App\Services\Frontend;

use App\Repositories\Frontend\Contracts\PageRepositoryInterface;

class PageService
{
    private $pageRepository;
    private $routeService;

    public function __construct(PageRepositoryInterface $pageRepository, RouteService $routeService)
    {
        $this->routeService = $routeService;
        $this->pageRepository = $pageRepository;
    }

    public function getAllData($slug){
        return [
            'data' => $this->routeService->getRequestedRouteData($slug),
            'nav' => $this->routeService->getAllRoutes(),
        ];
    }
}
