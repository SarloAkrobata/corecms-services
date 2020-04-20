<?php

namespace App\Services\Cms\Route;

use App\Repositories\Cms\Contracts\RouteRepositoryInterface;

class RouteService
{
    private $routeRepository;

    /**
     * RouteService constructor.
     * @param RouteRepositoryInterface $routeRepository
     */
    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function createMenuItems($data)
    {
        foreach ($data['menu'] as $key => $item) {
            if ($item['text'] == 'about' || $item['text'] == 'kontakt') {
                continue;
            }
            if (!empty($item['children'])) {
                $route = [
                    'route_path' => $item['text'],
                    'page_id' => 999,
                    'parent_route' => $key,
                    'order_number' => 99,
                    'menu_id' => 2
                ];
            }


            $this->routeRepository->create([]);
        }
    }
}
