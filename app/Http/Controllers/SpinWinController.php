<?php

namespace App\Http\Controllers;

use App\Models\PointUse;
use App\Models\SpinWin;
use Illuminate\Http\Request;

class SpinWinController extends Controller
{
    public function saveWinningId(Request $request)
    {
        try {
            // Retrieve winning ID from the request input
            $winningId = $request->input('winning_id');

            // Create a new SpinWin instance
            $spinWin = new SpinWin();
            $spinWin->winning_id = $winningId;
            $spinWin->user_id = auth()->user()->id;
            $spinWin->save();

            // Create a new PointUse instance
            $point = new PointUse();
            $point->user_id = auth()->user()->id;
            $point->point = 1;
            $point->save();

            // Return a success response
            return response()->json(['message' => 'Winning ID saved successfully']);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Failed to save winning ID'], 500);
        }
    }




}
