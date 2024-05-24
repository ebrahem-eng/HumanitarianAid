<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    //

    public function index ()
    {
        $employees=Employee::all();
        return view('Admin.Employee.index',compact('employees'));
    }

    public function create()
    {
        return view('Admin.Employee.create');
    }

    public function store (Request $request)
    {
        $name=$request->input('name');
        $email =$request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status= $request->input('status');
        $age= $request->input('age');
        $phone= $request->input('phone');
        $address= $request->input('address');
        $type= $request->input('type');

        Employee::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'gender'=>$gender,
            'status'=>$status,
            'age'=>$age,
            'phone'=>$phone,
            'address'=>$address,
            'type'=>$type,
            'createdBy'=>Auth()->guard('admin')->user()->id,

        ]);
        return redirect()->back()->with('successMessage', 'Employee Created Successfully');

    }

    public function edit($id)
    {
        $employee = Employee::findOrfail($id);
        return view('Admin.Employee.edit',compact('employee'));

    }

    public function update (Request $request ,$id)
    {
        $employee = Employee::findOrfail($id);
        $name=$request->input('name');
        $email =$request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status= $request->input('status');
        $age= $request->input('age');
        $phone= $request->input('phone');
        $address= $request->input('address');
        $type= $request->input('type');

        $employee->update([
            'name'=>$name,
            'email'=>$email,
            'gender'=>$gender,
            'status'=>$status,
            'age'=>$age,
            'phone'=>$phone,
            'address'=>$address,
            'type'=>$type,
            'createdBy'=>Auth()->guard('admin')->user()->id,

        ]);
        return redirect()->back()->with('successMessage', 'Employee Updated Successfully');
    }

    public function changePasswordPage($id)
    {
        $employee = Employee::findOrfail($id);
        return view('Admin.Employee.changePassword' , compact('employee'));
    }

    public function changePassword(Request $request , $id)
    {
        $association = Employee::findOrfail($id);
        $password = $request->input('password');
        $association->update([
            'password' => Hash::make($password),
        ]);
        return redirect()->back()->with('successMessage', 'Employee Password Changed Successfully');
    }
    

    public function softDelete($id)
    {
        $employee = Employee::findOrfail($id);
        $employee->delete();
        return redirect()->back()->with('successMessage', 'Employee Deleted Successfully');
    }

    public function archive()
    {
        $employees = Employee::onlyTrashed()->get();
        return view('Admin.Employee.archive' , compact('employees'));
    }

    public function restore($id)
    {
        Employee::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('successMessage', 'Employee Restored Successfully');
    }

    public function fourceDelete($id)
    {
        $employee = Employee::withTrashed()->where('id', $id)->first();
        if ($employee) {
            $employee->forceDelete();

            return redirect()->back()->with('successMessage', 'Employee Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Employee  Not Found');
        }
    }

    
}
