<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerChannelMemberUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_screen_sharing' => 'sometimes|bool'
        ];
    }
}
