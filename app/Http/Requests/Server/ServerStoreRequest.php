<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => 'required|string|max:32',
            'avatar' => 'nullable|image'
        ];
    }
}
