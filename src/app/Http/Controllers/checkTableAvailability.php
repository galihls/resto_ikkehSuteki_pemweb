<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataform;

class checkTableAvailability extends Controller
{
public function checkTableAvailability(Request $request)
{
    $validated = $request->validate([
        'table' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|string|max:255',
    ]);

    $isReserved = Dataform::where('table', $validated['table'])
        ->where('date', $validated['date'])
        ->where('time', $validated['time'])
        ->exists();

    return response()->json(['available' => !$isReserved]);
}
}
