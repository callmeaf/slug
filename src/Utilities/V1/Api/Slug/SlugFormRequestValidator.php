<?php

namespace Callmeaf\Slug\Utilities\V1\Api\Slug;

use Callmeaf\Base\Utilities\V1\FormRequestValidator;

class SlugFormRequestValidator extends FormRequestValidator
{
    public function index(): array
    {
        return [
            //
        ];
    }

    public function show(): array
    {
        return [
            //
        ];
    }

    public function unique(): array
    {
        return [
            'value' => true,
            'ignore' => false,
        ];
    }
}
