<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $emp = Employee::all();
            return DataTables::of($emp)
            ->addColumn('statusemp',function($emp){
                $act = $emp->status;
                if ($act == 1) {
                    $act = 'Activo';
                }elseif ($act == 0) {
                    $act = "Inactivo";
                }
                return $act;
            })
            ->addColumn('actual',function($emp){
                $act = $emp->created_at;
                return $act;
            })
            ->addColumn('update',function($emp){
                $upd = $emp->updated_at;
                return $upd;
            })
            ->addColumn('action',function($emp){
                $actions = '<a href="" class="btn btn-info btn-sm fas fa-edit"></a>';
                $actions .= '&nbsp;<button type="button" name="delete" id="" class="btn btn-danger btn-sm  fas fa-trash-alt"></button>';
                return $actions;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.employees.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:employees',
        ]);

        $emp =  Employee::create($request->all());

        return redirect()->to('admin/employees')->with('guardado','ok');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit',compact($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('eliminar', 'ok');
    }
}
