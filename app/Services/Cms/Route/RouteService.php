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
        foreach ($data['data'] as $key => $item) {
            if (!empty($item['children'])) {
                $route = [
                    'route_path' => $item['route'],
                    'route_name' => $item['name'],
                    'page_id' => 1,
                    'parent_route' => 0,
                    'order_number' => $key,
                    'menu_id' => 1
                ];
                $route = $this->routeRepository->create($route);
                $id = $route['id'];

                $this->recursion($item['children'], $id);
            } else {
                $route = [
                    'route_path' => $item['route'],
                    'route_name' => $item['name'],
                    'page_id' => 1,
                    'parent_route' => 0,
                    'order_number' => $key,
                    'menu_id' => 1
                ];
                $this->routeRepository->create($route);
            }
        }
    }

    private function recursion($children, $id){
        foreach ($children as $key => $child) {
            $route = [
                'route_path' => $child['route'],
                'route_name' => $child['name'],
                'page_id' => 1,
                'parent_route' => $id,
                'order_number' => $key,
                'menu_id' => 1
            ];
            $route = $this->routeRepository->create($route);
            $newId = $route['id'];
            if (!empty($child['children'])) {
                $this->recursion($child['children'], $newId);
            }
        }
        return [];
    }
}
