<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerChannelMemberStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'server_channel_id' => 'required|exists:server_channels,id',
        ];
    }
}
