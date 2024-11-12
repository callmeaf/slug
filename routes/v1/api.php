<?php

use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->middleware(config('callmeaf-base.api.middlewares'))->group(function() {
    Route::apiResource('slugs',config('callmeaf-slug.controllers.slugs'))->only(['index','show']);
    Route::prefix('slugs')->as('slugs.')->controller(config('callmeaf-slug.controllers.slugs'))->group(function() {
        Route::get('{type}/unique','unique');
    });
});
