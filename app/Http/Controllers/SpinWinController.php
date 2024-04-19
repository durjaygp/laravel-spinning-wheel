<?php

namespace App\Http\Controllers;

use App\Models\PointUse;
use App\Models\SpinWin;
use Illuminate\Http\Request;

class SpinWinController extends Controller
{
    public function saveWinningId(Request $request)
    {
        $winningId = $request->input('winning_id');
        $spinWin = new SpinWin();
        $spinWin->winning_id = $winningId;
        $spinWin->user_id = auth()->user()->id;
        $spinWin->save();

        $point = new PointUse();
        $point->user_id = auth()->user()->id;
        $point->point = 1;
        $point->save();
        // You can return a response if needed
        return response()->json(['message' => 'Winning ID saved successfully']);
    }




}
