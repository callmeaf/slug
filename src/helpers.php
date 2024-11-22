<?php

if(!function_exists('maxSlugLength')) {
    /**
     * @return int
     */
    function maxSlugLength(): int
    {
        return intval(config('callmeaf-slug.max_length'));
    }
}

if(!function_exists('slugValidationRules')) {
    function slugValidationRules(string $table,string $column = 'NULL',string|int|null $ignore = null): array
    {
        // TODO: SET IGNORE UNIQUE TABLE
        return [
           'slug' =>  [
               'string',
               'min:3',
               'max:' . maxSlugLength(),
               \Illuminate\Validation\Rule::unique(table: $table,column: $column)->ignore(id: $ignore)
           ],
        ];
    }
}
