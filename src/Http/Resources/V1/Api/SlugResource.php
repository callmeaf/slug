<?php

namespace Callmeaf\Slug\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SlugResource extends JsonResource
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return toArrayResource([
            'id' => fn() => $this->id,
            'sluggable_id' => fn() => $this->sluggable_id,
            'sluggable_type' => fn() => $this->sluggable_type,
            'sluggable_type_text' => fn() => $this->sluggableTypeText,
            'value' => fn() => $this->value,
            'created_at' => fn() => $this->created_at,
            'created_at_text' => fn() => $this->createdAtText,
            'sluggable' => fn() => $this->sluggable,
        ],$this->only);
    }
}
