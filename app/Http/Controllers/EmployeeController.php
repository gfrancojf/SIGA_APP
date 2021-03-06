<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\branches;
use App\Models\Departaments;
use App\Models\Locations;
use App\Models\Position;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $positions = Position::all();
        $locations = Locations::all();
        $companies = Branches::all();
        $departments = Departaments::all();

          $employees = DB::table('employees as e')
            ->join('departaments as d','e.departament_id','=','d.id')

            ->join('positions as p', 'e.position_id', '=', 'p.id')

            ->join('locations as l, e.location_id', '=', 'l.id')

            ->join('branches as b','e.company_id','=','b.id')

            ->select('e.*',
            'd.name as departament',
            'b.name as company', 
            'p.name as position', 
            'l.name as location')
            ->get()
            ->when($request->departament, function ($q) use ($request) {
                return $q->where('departament', '=', $request->departament);
            })
            ->when($request->location, function ($q) use ($request) {
                return $q->where('location', '=', $request->location);
            })
            ->when($request->position, function ($q) use ($request) {
                return $q->where('position', '=', $request->position);
            })
            ->when($request->company, function ($q) use ($request) {
                return $q->where('company','=', $request->company);
            })->when($request->name, function ($q) use ($request) {
                return $q->where('e.name', 'like', '%' . $request->name . '%');
            });
        //dd($employees);
        return view('Employee.index', 
        compact('employees','companies','departments','positions','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   
        
        $positions = Position::all();
        $locations = Locations::all();
        $companies = Branches::all();
        $departments = Departaments::all();
        return view('Employee.create', 
        compact('companies','departments','locations','positions'));
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
            'name' => 'required|max:255',
            'first_lastname' => 'required|max:255',
            'second_lastname' => 'required|max:255',
            'email' => 'required|unique:employees,email|email',
            'phone' => 'required|numeric',
            'cell_phone' => 'required|numeric',
            'birthday' => 'required',
            'department_id' => 'required',
            'company_id' => 'required',
            'date_of_admission' => 'required',
            'gender' => 'required',
        ]);
        $employee = Employee::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'El empleado ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with('company', 'department')
        ->where('id','=',$id)
        ->first();

        $companies = Branch::all();
        $departments = Departament::all();

        return view('Employee.edit', compact('employee', 'companies', 'departments'));
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

        Employee::whereId($id)->update($employeeData);

        return redirect()->route('employees.index')->with('success', 'El empleado ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
