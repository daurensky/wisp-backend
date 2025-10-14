<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Events\CallJoined;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CallController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $call = Call::query()
            ->create([
                'offer' => $request->input('offer')
            ]);

        return response()->json($call);
    }

    public function show(Call $call): JsonResponse
    {
        return response()->json($call);
    }

    public function join(Call $call, Request $request): JsonResponse
    {
        $call->update([
            'answer' => $request->input('answer')
        ]);

        broadcast(new CallJoined($call));

        return response()->json($call);
    }
}
