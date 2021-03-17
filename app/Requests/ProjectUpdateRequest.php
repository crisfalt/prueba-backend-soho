<?php

namespace App\Requests;

use Dingo\Api\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(count($this->segments()));

        return [
            'code' => [
                'required',
                'max:20',
                'unique:App\Models\Project,code,' . $id
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
