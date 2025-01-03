<?php

namespace Callmeaf\Slug\Http\Controllers\V1\Api;

use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Slug\Http\Requests\V1\Api\SlugIndexRequest;
use Callmeaf\Slug\Http\Requests\V1\Api\SlugShowRequest;
use Callmeaf\Slug\Http\Requests\V1\Api\SlugUniqueRequest;
use Callmeaf\Slug\Events\SlugIndexed;
use Callmeaf\Slug\Events\SlugShowed;
use Callmeaf\Slug\Models\Slug;
use Callmeaf\Slug\Services\V1\SlugService;
use Callmeaf\Slug\Utilities\V1\Api\Slug\SlugResources;

class SlugController extends ApiController
{
    protected SlugService $slugService;
    protected SlugResources $slugResources;
    public function __construct()
    {
        $this->slugService = app(config('callmeaf-slug.service'));
    }

    public static function middleware(): array
    {
        return app(config('callmeaf-slug.middlewares.slug'))();
    }

    public function index(SlugIndexRequest $request)
    {
        try {
            $resources = $this->slugResources->index();
            $slugs = $this->slugService->all(
                relations: $resources->relations(),
                columns: $resources->columns(),
                filters: $request->validated(),
            )->getCollection(asResourceCollection: true,asResponseData: true,attributes: $resources->attributes(),events: [
                SlugIndexed::class,
            ]);
            return apiResponse([
                'slugs' => $slugs,
            ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function show(SlugShowRequest $request,Slug $slug)
    {
        try {
            $resources = $this->slugResources->show();
            $slug = $this->slugService->setModel($slug)->getModel(
                asResource: true,
                attributes: $resources->attributes(),
                relations: $resources->relations(),
                events: [
                    SlugShowed::class,
                ],
            );
            return apiResponse([
                'slug' => $slug,
            ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function unique(SlugUniqueRequest $request,string $type)
    {
        try {
             $value = $this->slugService->makeUniqueSlug(value: $request->query('value'),type: $type,ignore: $request->query('ignore'));
             return apiResponse([
                 'value' => $value,
             ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

}
