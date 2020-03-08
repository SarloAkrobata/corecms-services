<?php

namespace App\Http\Transformers;

use App\Models\Frontend\Page;

class PageTransformer
{
    public static function transform(Page $page)
    {
        return [
            'id' => (int) $page->id,
            'title'=> $page->title,
            'description' => $page->description,
            'content' => $page->content,
            'layout' => $page->layout,
            'published' => $page->published,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at,
        ];
    }
}
