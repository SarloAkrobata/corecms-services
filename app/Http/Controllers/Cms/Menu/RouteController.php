<?php

namespace App\Http\Controllers\Cms\Menu;

use App\Http\Controllers\Controller;
use App\Services\Cms\Route\RouteService;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    private $routeService;

    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }

    public function store(Request $request)
    {
        $this->routeService->createMenuItems($request->all());
    }
}
