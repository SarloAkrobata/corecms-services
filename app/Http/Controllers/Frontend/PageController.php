<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageService;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function render($slug = 'home')
    {
        //dd($this->pageService->getAllData($slug));
        return view('theme.template.main', $this->pageService->getAllData($slug));
    }

}
