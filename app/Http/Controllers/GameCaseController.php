<?php

namespace App\Http\Controllers;

use App\Models\GameCase;
use App\Http\Requests\StoreGameCaseRequest;
use App\Http\Requests\UpdateGameCaseRequest;
use App\Models\Skin;
use Illuminate\Http\Request;

class GameCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gameCase = GameCase::with('skin')->latest()->get();
        return view('backEnd.game-case.index', compact('gameCase'));
    }

    public function fetchWinChances(Request $request)
    {
        $winChances = GameCase::select('id', 'win_chance')->where('status', 1)->get();
        // Fetch only active game cases and select id and win_chance columns
        return response()->json(['winChances' => $winChances]);
        // Return the win chances as JSON response
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skins = Skin::latest()->get();
        return view('backEnd.game-case.create',compact('skins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameCaseRequest $request)
    {
        $gameCase = $request->all();


        if ($request->file('image')) {
            $gameCase['image'] = $this->saveImage($request);
        }

        GameCase::create($gameCase);

        return redirect()->route('game-case.index')->with('success', 'game case created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameCase $gameCase)
    {
        $skins = Skin::latest()->get();
        return view('backEnd.game-case.edit', compact('gameCase','skins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameCaseRequest $request, GameCase $gameCase)
    {
        $data = $request->all();
        if ($request->file('image')) {
            if (file_exists($gameCase->image)) {
                unlink($gameCase->image);
            }
            $data['image'] = $this->saveImage($request);
        }


        $gameCase->update($data);

        return redirect()->route('game-case.index')->with('success', 'game case updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameCase $gameCase)
    {

        if (file_exists($gameCase->image)) {
            unlink($gameCase->image);
        }

        $gameCase->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }


    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand() . '.' . $this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }
}
