<?php

namespace App\Http\Requests\Server;

use Illuminate\Validation\Rule;
use App\Enums\Peer\SdpTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class ServerChannelConnectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::enum(SdpTypeEnum::class)],
            'sdp'  => 'required|string',
        ];
    }
}
