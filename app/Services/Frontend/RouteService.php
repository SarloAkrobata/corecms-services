<?php

namespace App\Services\Frontend;

use App\Http\Transformers\RouteTransformer;
use App\Repositories\Frontend\Contracts\RouteRepositoryInterface;

class RouteService
{
    private $routeRepository;

    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getRequestedRouteData($slug)
    {
        return RouteTransformer::transform($this->routeRepository->firstOrFail($slug));
    }

    public function getAllRoutes()
    {
        $routes = [];
        $new = [];
        $final = [];
        foreach ($this->routeRepository->all() as $item) {
            $routes[] = [
                'id' => $item->id,
                'path'=> $item->route_path,
                'name'=> $item->route_name,
                'parent_route'=>$item->parent_route,
                'position' => $item->menu->position,
            ];
        }
        foreach ($routes as $a){
            $new[$a['parent_route']][] = $a;
        }
        foreach ($this->createTree($new, $new[0]) as $item) {
            $final[$item['path']] = $item;
        }

        return $final;
    }

    private function createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k => $l){
            if(isset($list[$l['id']])){
                $l['children'] = $this->createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }
}
