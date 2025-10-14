<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;
use App\Events\CandidateAdded;

class CallCandidateController extends Controller
{
    public function store(Call $call, Request $request)
    {
        $candidate = $call->candidates()
            ->create([
                'type'           => $request->input('type'),
                'candidate_data' => $request->input('candidate_data')
            ]);

        broadcast(new CandidateAdded($call, $candidate));

        return response()->json($candidate);
    }
}
