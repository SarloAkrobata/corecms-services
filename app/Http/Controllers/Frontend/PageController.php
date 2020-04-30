<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageService;
use Illuminate\Support\Facades\Request;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function render($slug = 'home')
    {
//        dd(Request::segment(3));
        return view('theme.template.main', $this->pageService->getAllData($slug));
    }

}
