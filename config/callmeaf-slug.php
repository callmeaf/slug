<?php

return [
    'model' => \Callmeaf\Slug\Models\Slug::class,
    'model_resource' => \Callmeaf\Slug\Http\Resources\V1\Api\SlugResource::class,
    'model_resource_collection' => \Callmeaf\Slug\Http\Resources\V1\Api\SlugCollection::class,
    'service' => \Callmeaf\Slug\Services\V1\SlugService::class,
    // slug max length mines -2 for make sure appended slug does not far from length
    // example: if you want max length slug to 80, set this value to 78
    'max_length' => 78,
    'default_values' => [
        //
    ],
    'events' => [
        \Callmeaf\Slug\Events\SlugIndexed::class => [
            // listeners
        ],
        \Callmeaf\Slug\Events\SlugShowed::class => [
            // listeners
        ],
    ],
    'validations' => [
        'slug' => \Callmeaf\Slug\Utilities\V1\Api\Slug\SlugFormRequestValidator::class,
    ],
    'resources' => [
        'slug' => \Callmeaf\Slug\Utilities\V1\Api\Slug\SlugResources::class,
    ],
    'controllers' => [
        'slugs' => \Callmeaf\Slug\Http\Controllers\V1\Api\SlugController::class,
    ],
    'form_request_authorizers' => [
        'slug' => \Callmeaf\Slug\Utilities\V1\Api\Slug\SlugFormRequestAuthorizer::class,
    ],
    'middlewares' => [
        'slug' => \Callmeaf\Slug\Utilities\V1\Api\Slug\SlugControllerMiddleware::class,
    ],
];
