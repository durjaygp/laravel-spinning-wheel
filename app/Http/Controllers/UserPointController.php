<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPoint;
use App\Http\Requests\StoreUserPointRequest;
use App\Http\Requests\UpdateUserPointRequest;

class UserPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userPoint = UserPoint::with('user')->latest()->get();

        return view('backEnd.userPoint.index', compact('userPoint'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNot('role_id', 2)->latest()->get();

        return view('backEnd.userPoint.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPointRequest $request)
    {
        $point = $request->all();
        UserPoint::create($point);
        return redirect()->route('user-point.index')->with('success', 'user point created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPoint $userPoint)
    {
        $users = User::whereNot('role_id', 2)->latest()->get();

        return view('backEnd.userPoint.edit', compact('userPoint', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPointRequest $request, UserPoint $userPoint)
    {
        $point = $request->all();

        $userPoint->update($point);

        return redirect()->route('user-point.index')->with('success', 'user point updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPoint $userPoint)
    {
        $userPoint->delete();
        return redirect()->back()->with('success', 'user point deleted Successfully');
    }
}
