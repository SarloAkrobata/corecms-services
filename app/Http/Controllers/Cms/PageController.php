<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Services\Frontend\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function getMenu($slug = 'home')
    {
        $data = $this->pageService->getAllData($slug);

        $nav = [];
        foreach ($data['nav'] as $key => $item) {
            if ($key==='home') continue;
        }
        return response()->json($nav['nav']);
    }

    public function store(PageRequest $request)
    {

    }
}
