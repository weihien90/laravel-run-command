<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServerConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'total_memory' => ['required', 'integer', 'max:' . config('server-manager.max_total_memory')],
            'memory_limit' => ['required', 'integer', 'lte:total_memory'],

            'storage_limit' => ['required', 'integer', 'max:' . config('server-manager.max_total_storage')],
        ];
    }
}
