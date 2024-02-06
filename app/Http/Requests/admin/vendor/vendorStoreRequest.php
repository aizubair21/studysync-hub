<?php

namespace App\Http\Requests\admin\vendor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class vendorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => "required",
            "password" => "required|min:12|max:255",
            "name" => "required|min:5|max:25",
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user)
            ],
            "is_role" => "required|string|max:5",
            "pack" => "required|string",
        ];
    }
}
