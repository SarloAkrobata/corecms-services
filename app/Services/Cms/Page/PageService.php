<?php


namespace App\Services\Cms\Page;


use App\Repositories\Cms\Contracts\PageRepositoryInterface;
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

    public function createPage($data)
    {
        $this->pageRepository->create($data);
    }

    public function updatePage($id, $data)
    {
        $page = $this->pageRepository->show($id);
        $this->pageRepository->update($data, $page);
    }

    public function getPage($pageId)
    {
        $page = $this->pageRepository->show($pageId);

        return $page;
    }

    public function getAllPages()
    {
       return $this->pageRepository->all();

    }

    public function deletePage($pageId)
    {
        $page = $this->pageRepository->show($pageId);
        $this->pageRepository->delete($page);
    }
}
