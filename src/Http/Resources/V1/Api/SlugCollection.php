<?php

namespace Callmeaf\Slug\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SlugCollection extends ResourceCollection
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function($slug) {
            return toArrayResource([
                'id' => fn() => $slug->id,
                'sluggable_id' => fn() => $slug->sluggable_id,
                'sluggable_type' => fn() => $slug->sluggable_type,
                'sluggable_type_text' => fn() => $slug->sluggableTypeText,
                'value' => fn() => $slug->value,
                'created_at' => fn() => $slug->created_at,
                'created_at_text' => fn() => $slug->createdAtText,
                'sluggable' => fn() => $slug->sluggable,
            ],$this->only);
        });
    }
}
