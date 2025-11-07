<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerCategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'server_id' => 'required|string|exists:servers,id',
            'name'      => 'required|string|max:32'
        ];
    }
}
