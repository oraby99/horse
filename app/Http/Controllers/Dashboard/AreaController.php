<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $areas = Area::all();
        return view('dashboard.areas.index', compact('areas'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('dashboard.areas.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::create($validated);
        return redirect()->back()->with('success', 'Data Added');

    }

    // Display the specified resource.
    public function show($id)
    {
        $area = Area::findOrFail($id);
        return response()->json($area);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('dashboard.areas.edit', compact('area'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::findOrFail($id);
        $area->update($validated);
        return redirect()->back()->with('sucess','Data Updated');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return response()->json(['message' => 'Area deleted successfully']);
    }

    public function getAllData()
    {
         $data = Area::simplePaginate(20);
         return response()->json(['data'=>AreaResource::collection($data),'message'=>'success','status'=>200]);
    }
}
