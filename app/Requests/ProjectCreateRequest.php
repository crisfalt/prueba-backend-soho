<?php

namespace App\Requests;

use Dingo\Api\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:20',
                'unique:App\Models\Project,code'
            ],
            'name' => 'required|string|max:120',
            'description' => 'required|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
