<?php


namespace App\Services\Cms\Page;


use App\Repositories\Cms\Contracts\PageRepositoryInterface;
use App\Services\Frontend\RouteService;

class PageService
{
    private $pageRepository;
    private $routeService;

    /**
     * PageService constructor.
     * @param PageRepositoryInterface $pageRepository
     * @param RouteService $routeService
     */
    public function __construct(PageRepositoryInterface $pageRepository, RouteService $routeService)
    {
        $this->routeService = $routeService;
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function createPage(array $data): bool
    {
        try {
            $this->pageRepository->create($data);
        } catch (\Exception $e) {
            return false;
        }

        return true;
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
