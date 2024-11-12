<?php

namespace Callmeaf\Slug\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class SlugShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-slug.form_request_authorizers.slug'))->show();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [

        ],filters: app(config("callmeaf-slug.validations.slug"))->show());
    }

}
