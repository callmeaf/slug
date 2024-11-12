<?php

namespace Callmeaf\Slug\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class SlugUniqueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-slug.form_request_authorizers.slug'))->unique();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [
            'value' => ['string','max:255'],
            'ignore' => ['string']
        ],filters: app(config("callmeaf-slug.validations.slug"))->unique());
    }

}
