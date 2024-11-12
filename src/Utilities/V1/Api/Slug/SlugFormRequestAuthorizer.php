<?php

namespace Callmeaf\Slug\Utilities\V1\Api\Slug;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;

class SlugFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function index(): bool
    {
        return true;
    }


    public function show(): bool
    {
        return true;
    }

    public function unique(): bool
    {
        return true;
    }
}
