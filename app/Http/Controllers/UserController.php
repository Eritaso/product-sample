<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function me(): JsonResponse
    {
        return response()->json([
            'id' => auth()->user()->getAuthIdentifier(),
            'name' => auth()->user()->name
        ]);
    }
}
