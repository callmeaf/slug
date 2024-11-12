<?php

namespace Callmeaf\Slug\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Slug\Services\V1\Contracts\SlugServiceInterface;
use Callmeaf\Slug\Enums\SlugType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SlugService extends BaseService implements SlugServiceInterface
{
    public function __construct(?Builder $query = null, ?Model $model = null, ?Collection $collection = null, ?string $resource = null, ?string $resourceCollection = null, array $defaultData = [])
    {
        parent::__construct($query, $model, $collection, $resource, $resourceCollection, $defaultData);
        $this->query = app(config('callmeaf-slug.model'))->query();
        $this->resource = config('callmeaf-slug.model_resource');
        $this->resourceCollection = config('callmeaf-slug.model_resource_collection');
        $this->defaultData = config('callmeaf-slug.default_values');
    }

    public function makeUniqueSlug(string $value, string|SlugType $type,string|int|null $ignore = null): string
    {
        if(is_string($type)) {
            $type = SlugType::from(value: $type);
        }
        /**
         * @var ?BaseService $service
         */
        $service = match ($type) {
            SlugType::PRODUCT => app(config('callmeaf-product.service')),
            default => null,
        };
        $slug = Str::of($value)->slug(language: null)->toString();
         $service->where(column: 'slug',valueOrOperation: $slug);
        if($ignore) {
            $service->whereNot(column: 'id',valueOrOperation: $ignore);
        }
        if($existsSlug = $service->first(failed: false)->getModel()) {
            $slug = Str::of($existsSlug->slug);
            $index = intval($slug->afterLast('-')->toString());
            $nextIndex = $index + 1;
            $slug = $slug->replaceLast(search: "-$index" ,replace: "")->append("-$nextIndex")->toString();
            return $this->makeUniqueSlug(value: $slug,type: $type);
        }
        return $slug;
    }
}
