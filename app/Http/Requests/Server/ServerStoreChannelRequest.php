<?php

namespace App\Http\Requests\Server;

use Illuminate\Validation\Rule;
use App\Enums\Server\ChannelTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class ServerStoreChannelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:32',
            'type' => ['required', Rule::enum(ChannelTypeEnum::class)]
        ];
    }
}
