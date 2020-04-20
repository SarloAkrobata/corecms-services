<?php

namespace App\Services\Cms\Menu;

use App\Models\Cms\Menu\Menu;
use App\Repositories\Cms\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class MenuService
{
    private $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * @param $data
     * @return bool
     */
    public function createMenu($data): bool
    {
        try {
            $this->menuRepository->create($data);
        } catch (\Exception $e) {
            Log::error('CreateMENU', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateMenu(int $id, array $data): bool
    {
        $menu = $this->menuRepository->show($id);
        try {
            $this->menuRepository->update($data, $menu);
        } catch (\Exception $e) {
            Log::error('UpdateMENU', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    /**
     * @param int $menuId
     * @return Menu
     */
    public function getMenu(int $menuId): Menu
    {
        return $this->menuRepository->show($menuId);
    }

    /**
     * @return Collection
     */
    public function getAllMenu(): Collection
    {
        return $this->menuRepository->all();
    }

    /**
     * @param int $menuId
     * @return bool
     */
    public function deleteMenu(int $menuId): bool
    {
        $album = $this->menuRepository->show($menuId);
        try {
            $this->menuRepository->delete($album);
        } catch (\Exception $e) {
            Log::error('DeleteMENU', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }
}
