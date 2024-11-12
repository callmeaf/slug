<?php

namespace Callmeaf\Slug\Utilities\V1\Api\Slug;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;

class SlugControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(BaseController $controller): void
    {
        $controller->middleware([
            'auth:sanctum',
        ])->only([
            'index',
            'show',
        ]);
    }
}
