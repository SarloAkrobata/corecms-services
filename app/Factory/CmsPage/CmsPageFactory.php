<?php

namespace App\Factory\CmsPage;

use App\Factory\AbstractResourceFactory;
use App\Http\Resources\Page\CmsPageResource;
use App\Services\Cms\Page\PageService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CmsPageFactory extends AbstractResourceFactory
{
    /**
     * @param $page
     * @return CmsPageResource
     */
    function makeResource(Model $page): CmsPageResource
    {
        return new CmsPageResource($page);
    }

    /**
     * @param $page
     * @return AnonymousResourceCollection
     */
    function makeResourceCollection(Collection $page): AnonymousResourceCollection
    {
        return CmsPageResource::collection($page);
    }
}
