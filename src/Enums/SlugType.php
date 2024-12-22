<?php

namespace Callmeaf\Slug\Enums;

enum SlugType: string
{
    case PRODUCT = 'product';
    case PRODUCT_CATEGORY = 'product_category';
    case CONTINENT = 'continent';
    case COUNTRY = 'country';
    case PROVINCE = 'province';
}
