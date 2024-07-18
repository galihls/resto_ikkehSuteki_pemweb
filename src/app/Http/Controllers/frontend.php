<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\dataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class frontend extends Controller
{
    public function index()
    {
        $currentDate = now()->toDateString();
        $currentTime = now()->format('H:i');

        $reservedDates = Dataform::select('date')
            ->groupBy('date')
            ->get()
            ->pluck('date')
            ->toArray();

        $initialTables = collect([
            (object)['ids' => 1, 'name' => 'Table 1', 'available' => true],
            (object)['ids' => 2, 'name' => 'Table 2', 'available' => true],
            (object)['ids' => 3, 'name' => 'Table 3', 'available' => true],
            (object)['ids' => 4, 'name' => 'Table 4', 'available' => true],
        ]);

        $reservedTableIds = Dataform::where('date', '=', $currentDate)
            ->where('time', 'LIKE', "%$currentTime%")
            ->pluck('table')
            ->unique();

        $availableTables = $initialTables->map(function ($table) use ($reservedTableIds) {
            if ($reservedTableIds->contains($table->ids)) {
                $table->available = false;
            }
            return $table;
        });

        $reservedTimesByTable = Dataform::select('table', 'date', 'time')
            ->get()
            ->groupBy('table')
            ->map(function ($reservations) {
                return $reservations->groupBy('date')->map(function ($times) {
                    return $times->pluck('time');
                });
            })->toArray();

        return view('steak.index', compact('reservedTimesByTable', 'reservedDates', 'availableTables'));
    }

    // Pastikan untuk menambahkan use statement untuk Midtrans:

// public function store(Request $request)
// {
//     // Validate the request data
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email',
//         'phone' => 'required|string|max:255',
//         'guests' => 'required|integer',
//         'table' => 'required|string|max:255',
//         'date' => 'required|date',
//         'time' => 'required|string|max:255',
//     ]);

//     // Create a new reservation instance and fill it with validated data
//     $reservation = new Dataform();
//     $reservation->name = $validated['name'];
//     $reservation->email = $validated['email'];
//     $reservation->phone = $validated['phone'];
//     $reservation->guests = $validated['guests'];
//     $reservation->table = $validated['table']; // Assuming 'table' field is the ID of the table
//     $reservation->date = $validated['date'];
//     $reservation->time = $validated['time']; // Combining date and time into one field
//     $reservation->total_price = 80000; // Adding total_price field with a fixed value of 80000
    

//     // Save the reservation
//     $reservation->save();

//     // Return a JSON response with a success message
//     return response()->json(['success' => 'Reservation successfully created.', 'eservation_id' => $reservation->id], 201);
// }

public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:255',
        'guests' => 'required|integer',
        'table' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|string|max:255',
    ]);

    // Check if the table is available for the selected date and time
    $currentDate = $validated['date'];
    $currentTime = $validated['time'];
    $tableId = $validated['table'];

    $reservedTableIds = Dataform::where('date', '=', $currentDate)
        ->where('time', 'LIKE', "%$currentTime%")
        ->pluck('table')
        ->unique();

    if ($reservedTableIds->contains($tableId)) {
        return response()->json(['error' => 'Table is not available for the selected date and time.'], 422);
    }

    // Create a new reservation instance and fill it with validated data
    $reservation = new Dataform();
    $reservation->name = $validated['name'];
    $reservation->email = $validated['email'];
    $reservation->phone = $validated['phone'];
    $reservation->guests = $validated['guests'];
    $reservation->table = $validated['table'];
    $reservation->date = $validated['date'];
    $reservation->time = $validated['time'];
    $reservation->total_price = 80000; // Adding total_price field with a fixed value of 80000

    // Save the reservation
    $reservation->save();

    // Return a JSON response with a success message
    return response()->json(['success' => 'Reservation successfully created.', 'reservation_id' => $reservation->id], 201);
}

// public function store(Request $request)
// {
//     // Validate the request data
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email',
//         'phone' => 'required|string|max:255',
//         'guests' => 'required|integer',
//         'table' => 'required|string|max:255',
//         'date' => 'required|date',
//         'time' => 'required|string|max:255',
//     ]);

//     $tableId = $validated['table'];
//     $date = $validated['date'];
//     $time = $validated['time'];

//     // Check if the table is already reserved for the given date and time
//     $isReserved = Dataform::where('table', $tableId)
//         ->where('date', $date)
//         ->where('time', $time)
//         ->exists();

//     if ($isReserved) {
//         return response()->json(['error' => 'The selected table is already reserved for the chosen time.'], 400);
//     }

//     // Create a new reservation instance and fill it with validated data
//     $reservation = new Dataform();
//     $reservation->name = $validated['name'];
//     $reservation->email = $validated['email'];
//     $reservation->phone = $validated['phone'];
//     $reservation->guests = $validated['guests'];
//     $reservation->table = $validated['table'];
//     $reservation->date = $validated['date'];
//     $reservation->time = $validated['time'];
//     $reservation->total_price = 80000; // Adding total_price field with a fixed value of 80000
//     $reservation->status = 'unpaid'; // Adding status field with 'unpaid' value

//     // Save the reservation
//     $reservation->save();

//     // Return a JSON response with a success message
//     return response()->json(['success' => 'Reservation successfully created.', 'reservation' => $reservation], 201);
// }

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


