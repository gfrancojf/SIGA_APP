<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\departaments;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    
    public function index()
    {
        {
            abort_if(Gate::denies('departament_index'), 403);
            $departaments = departaments::paginate(5);

         
            return view('departament.index', compact('departaments'));
         }
    }

    
    public function create()
    {
        abort_if(Gate::denies('departament_create'), 403);

        return view('departament.create');
    }

  
    public function store(Request $request)
    {
        $departamentsData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $departaments = departaments::create($departamentsData);

        return redirect()->route('departaments.index')
        ->with('success', 'La Oficina ha sido guardada!');
   
    }
     public function show($id)
    {
        //
    }
   
    public function edit($id)
    {
        abort_if(Gate::denies('branch_edit'), 403);

        $departaments = departaments::findOrFail($id);
        return view('departament.edit', compact('departaments')); 
    }

 
    public function update(Request $request, $id)
    {
        $departamentsData = $request->validate([
            'name' => 'required|max:255'
        ]);

        departaments::whereId($id)->update($departamentsData);

        return redirect()->route(' departaments.index')->with('success', 'La empresa ha sido actualizada');
   
    }

   
    public function destroy($id)
    {
 
    }
}
