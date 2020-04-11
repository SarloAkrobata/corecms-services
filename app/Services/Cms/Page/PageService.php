<?php


namespace App\Services\Cms\Page;


use App\Repositories\Cms\Contracts\PageRepositoryInterface;
use App\Services\Frontend\RouteService;
use Illuminate\Support\Facades\Log;

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
            Log::error('CreatePAGE', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    public function updatePage($id, $data)
    {
        $page = $this->pageRepository->show($id);
        try {
            $this->pageRepository->update($data, $page);
        } catch (\Exception $e) {
            Log::error('UpdatePAGE', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    public function getPage($pageId)
    {
        return $this->pageRepository->show($pageId);
    }

    public function getAllPages()
    {
       return $this->pageRepository->all();
    }

    public function deletePage($pageId)
    {
        $page = $this->pageRepository->show($pageId);
        try {
            $this->pageRepository->delete($page);
        } catch (\Exception $e) {
            Log::error('DeletePAGE', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }
}
