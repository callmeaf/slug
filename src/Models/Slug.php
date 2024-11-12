<?php

namespace Callmeaf\Slug\Models;

use Callmeaf\Base\Traits\HasDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Slug extends Model
{
    use HasFactory,HasDate;

    protected $fillable = [
        'sluggable_id',
        'sluggable_type',
        'value',
    ];

    public function sluggable(): MorphTo
    {
        return $this->morphTo('sluggable');
    }
}
