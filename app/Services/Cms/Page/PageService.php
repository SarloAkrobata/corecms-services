<?php

namespace App\Services\Cms\Page;

use App\Models\Cms\Page\Page;
use App\Repositories\Cms\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PageService
{
    private $pageRepository;

    /**
     * PageService constructor.
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(PageRepositoryInterface $pageRepository)
    {
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
