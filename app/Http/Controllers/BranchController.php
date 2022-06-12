<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Models\branches;
use Illuminate\Http\Request;



class BranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('branch_index'), 403);
        $branches = Branches::all();

      
        return view('Company.index', compact('branches'));
    }

  
    public function create()
    {   abort_if(Gate::denies('branch_create'), 403);
        return view('Company.create');
    }

  
    public function store(Request $request)
    {
        $branchData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $branch = branches::create($branchData);

        return redirect()->route('branches.index')->with('success', 'La empresa ha sido guardada!');
    }

    public function show(Branches $branches)
    {
        abort_if(Gate::denies('branch_show'), 403);
    }

    public function edit($id)
    {
        abort_if(Gate::denies('branch_edit'), 403);

        $branch = Branches::findOrFail($id);
        return view('Company.edit', compact('branch')); 
    }

    public function update(Request $request, $id)
    {
        $branchData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Branches::whereId($id)->update($branchData);

        return redirect()->route('branches.index')->with('success', 'La empresa ha sido actualizada');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('branch_destroy'), 403);

        $branch = Branches::findOrFail($id);
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'La empresa ha sido eliminada');
    }
}