<?php

namespace App\Services\Cms\Page;

use App\Models\Cms\Page\Page;
use App\Repositories\Cms\Contracts\PageRepositoryInterface;
use App\Repositories\Cms\Contracts\RouteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PageService
{
    private $pageRepository;
    private $routeRepository;

    /**
     * PageService constructor.
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(PageRepositoryInterface $pageRepository, RouteRepositoryInterface $routeRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->routeRepository = $routeRepository;
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function createPage(array $data): bool
    {
        try {
            $page = $this->pageRepository->create($data);
        } catch (\Exception $e) {
            Log::error('CreatePAGE', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        if (!empty($data['route_id'])) {
            $route = $this->routeRepository->show($data['route_id']);
            $this->routeRepository->update(['menu_id' => $data['menu_id'],
                'page_id' => $page['id'] ], $route);
        }

        return true;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updatePage(int $id, array $data): bool
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

    /**
     * @param int $pageId
     * @return Page
     */
    public function getPage(int $pageId): Page
    {
        return $this->pageRepository->show($pageId);
    }

    /**
     * @return Collection
     */
    public function getAllPages(): Collection
    {
       return $this->pageRepository->all();
    }

    /**
     * @param int $pageId
     * @return bool
     */
    public function deletePage(int $pageId): bool
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
