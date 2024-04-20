<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use App\Http\Requests\StoreSkinRequest;
use App\Http\Requests\UpdateSkinRequest;

class SkinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skin = Skin::latest()->get();

        return view('backEnd.skin.index', compact('skin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.skin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkinRequest $request)
    {
        $skin = $request->all();

        if ($request->file('image')) {
            $skin['image'] = $this->saveImage($request);
        }

        Skin::create($skin);

        return redirect()->route('skin.index')->with('success', 'Case Category created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skin $skin)
    {
        return view('backEnd.skin.edit', compact('skin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkinRequest $request, Skin $skin)
    {
        $data = $request->all();

        if ($request->file('image')) {
            if (file_exists($skin->image)) {
                unlink($skin->image);
            }
            $data['image'] = $this->saveImage($request);
        }

        $skin->update($data);

        return redirect()->route('skin.index')->with('success', 'Case Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skin $skin)
    {
        if (file_exists($skin->image)) {
            unlink($skin->image);
        }

        $skin->delete();

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
