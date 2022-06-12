<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
   
    public function index()
    {
        abort_if(Gate::denies('location_index'), 403);
            $locations = Locations::all();
            return view('location.index', compact('locations'));
    }


    public function create()
    {
        abort_if(Gate::denies('location_create'), 403);

        return view('location.create');
    }

    public function store(Request $request)
    {
        $locationsData = $request->validate([
            'name' => 'required|max:25|unique:locations',
        ]);

        $locations = Locations::create($locationsData);

        return redirect()->route('locations.index')
        ->with('success', 'La Oficina ha sido guardada!');
    }
   
    public function show($id)
    {
        
    }

    public function edit(Locations $locations)
    {
        abort_if(Gate::denies('location_edit'), 403);
        $locations = Locations::findOrFail($locations->id);
        return view('location.edit', compact('locations'));
    }

    public function update(Request $request, Locations $locations)
    {
        $locationsData = $request->validate([
            'name' => 'required|max:255|unique:locations'
        ]);

        $locations->update($locationsData);

        return redirect()->route('locations.index')
        ->with('success', 'La Oficina ha sido actualizada!');
    }

    public function destroy(Locations $locations)
    {
        abort_if(Gate::denies('location_destroy'), 403);
        $locations->delete();

        return redirect()->route('locations.index')
        ->with('success', 'La Oficina ha sido eliminada!');

    }
}
