<?php

namespace Callmeaf\Slug\Events;

use Callmeaf\Slug\Models\Slug;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SlugShowed
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Slug $cart)
    {

    }
}
