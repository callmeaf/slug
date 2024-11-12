<?php

namespace Callmeaf\Slug\Utilities\V1\Api\Slug;


use Callmeaf\Base\Utilities\V1\Resources;

class SlugResources extends Resources
{
    public function index(): self
    {
        $this->data = [
            'attributes' => [
                'sluggable_id',
                'sluggable_type',
                'sluggable_type_text',
                'value',
                'created_at',
                'created_at_text',
            ],
        ];
        return $this;
    }

    public function show(): Resources
    {
        $this->data = [
            'relations' => [
                'sluggable'
            ],
            'attributes' => [
                'sluggable_id',
                'sluggable_type',
                'sluggable_type_text',
                'value',
                'created_at',
                'created_at_text',
                'sluggable',
            ],
        ];
        return $this;
    }
}
