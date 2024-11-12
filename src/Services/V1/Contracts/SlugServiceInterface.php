<?php

namespace Callmeaf\Slug\Services\V1\Contracts;

use Callmeaf\Base\Services\V1\Contracts\BaseServiceInterface;
use Callmeaf\Otp\Services\V1\OtpService;
use Callmeaf\Slug\Enums\SlugType;
use Callmeaf\Sms\Services\V1\SmsService;

interface SlugServiceInterface extends BaseServiceInterface
{
    public function makeUniqueSlug(string $value,SlugType|string $type,string|int|null $ignore = null): string;
}
