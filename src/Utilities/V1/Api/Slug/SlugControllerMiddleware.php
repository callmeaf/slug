<?php

namespace Callmeaf\Slug\Utilities\V1\Api\Slug;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SlugControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(): array
    {
        return [
            new Middleware(middleware: 'auth:sanctum',only: [
                'index',
                'show'
            ]),
        ];
    }
}
