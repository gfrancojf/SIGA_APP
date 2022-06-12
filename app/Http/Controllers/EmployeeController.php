<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Models\Branches;
use App\Models\Departaments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Branches::all();
        $departaments = Departaments::all();

          $employees = DB::table('employees as e')
            ->join('departaments as d','e.departament_id','=','d.id')
            ->join('branches as b','e.company_id','=','b.id')
            ->select('e.*','d.name as departament','b.name as company')
            ->get()->when($request->departament, function ($q) use ($request) {
                return $q->where('departament', '=', $request->deparatment);
            })->when($request->company, function ($q) use ($request) {
                return $q->where('company','=', $request->company);
            })->when($request->name, function ($q) use ($request) {
                return $q->where('e.name', 'like', '%' . $request->name . '%');
            });
        //dd($employees);
        return view('employee.index', compact('employees','companies','departaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $companies = Branches::all();
        // $departaments = Departaments::all();
         return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        $employeeData = $request->validate([
            'name' => 'required|max:100',
            'dni' => 'required|unique:employees',
            'first_lastname' => 'required|max:100',
            'second_lastname' => 'max:100',
           
            'phone' => 'required|numeric',
            'cell_phone' => 'required|numeric',
            'birthday' => 'required',
            'department_id' => 'required',
            'company_id' => 'required',
            'date_of_admission' => 'required',
            'date_of_egress' => 'nullable',
            'gender' => 'required',
        ]);
        $employee = Employees::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'El empleado ha sido guardado!');
    }

   

    public function edit($id)
    {
        $employee = employees::with('company', 'department')
        ->where('id','=',$id)
        ->first();

        $companies = Branches::all();
        $departments = Departaments::all();

        return view('employee.edit', compact('employee', 'companies', 'departaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeData = $request->validate([
            'name' => 'required|max:255',
            'first_lastname' => 'required|max:255',
            'second_lastname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'cell_phone' => 'required|numeric',
            'birthday' => 'required',
            'department_id' => 'required',
            'company_id' => 'required',
            'date_of_admission' => 'required',
            'gender' => 'required',
        ]);

        Employees::whereId($id)->update($employeeData);

        return redirect()->route('employees.index')->with('success', 'El empleado ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
