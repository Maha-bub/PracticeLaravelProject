<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();

        return view('backend.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_name' => 'required|string|max:255',
        ]);

        District::create([
            'district_name' => $request->district_name,
        ]);

        return redirect()->route('district.index')->with('succes', 'District created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $district = District::findOrFail($id);
        return view('backend.districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'district_name' => 'required|string|max:255',
        ]);

        $district = District::findOrFail($id);
        $district->update([
            'district_name' => $request->district_name,
        ]);

        return redirect()->route('district.index')->with('succes', 'District updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        District::find($id)->delete();
        return redirect()->route('distric.index')->with('success', 'District Deleted successfully!');
    }
}
