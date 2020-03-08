<?php

namespace App\Http\Transformers;

use App\Models\Frontend\Route;

class RouteTransformer
{
    public static function transform(Route $route)
    {
        return [
            'id' => (int) $route->id,
            'route_name'=> $route->route_path,
            'page' => PageTransformer::transform($route->page),
        ];
    }
}
