<?php

namespace App\Http\Requests\Server;

use Illuminate\Validation\Rule;
use App\Enums\Server\ChannelTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class ServerChannelStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'server_category_id' => 'required|string|exists:server_categories,id',
            'name'               => 'required|string|max:32',
            'type'               => ['required', Rule::enum(ChannelTypeEnum::class)]
        ];
    }
}
