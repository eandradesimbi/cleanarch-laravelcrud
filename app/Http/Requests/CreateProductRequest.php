<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["string", "required"],
            "category" => ["string", "required"],
            "quantity" => ["integer", "required"],
        ];
    }
}
