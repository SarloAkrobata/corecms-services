<?php


namespace App\Services\Cms\Page;


use App\Repositories\Frontend\Contracts\PageRepositoryInterface;
use App\Services\Frontend\RouteService;

class PageService
{
    private $pageRepository;
    private $routeService;

    public function __construct(PageRepositoryInterface $pageRepository, RouteService $routeService)
    {
        $this->routeService = $routeService;
        $this->pageRepository = $pageRepository;
    }

    public function createPage()
    {

    }
}
