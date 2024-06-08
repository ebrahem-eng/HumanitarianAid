<?php

namespace App\Http\Controllers\Employe\GarageEmployee;

use App\Http\Controllers\Controller;
use App\Models\GarageEmployee;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class GarageEmployeeController extends Controller
{
    //

    public function index ()
    {
        $vehicles=Vehicles::all();
        return view('Employe.GarageEmployee.index',compact('vehicles'));
    }

    public function create()
    {
        return view('Employee.GarageEmployee.create');
    }

    public function store (Request $request)
    {
        $name=$request->input('name');
        $type =$request->input('type');
        $capacity = $request->input('capacity');
        $availableStatus = $request->input('availableStatus');
        $quantity= $request->input('quantity');

        Vehicles::create([
            'name'=>$name,
            'type'=>$type,
            'capacity'=>$capacity,
            'availableStatus'=>$availableStatus,
            'quantity'=>$quantity,
            'createdBy'=>Auth()->guard('employee')->user()->id,

        ]);
        return redirect()->back()->with('successMessage', 'Vehicle Created Successfully');

    }

    public function edit($id)
    {
        $vehicle = Vehicles::findOrfail($id);
        return view('Employee.GarageEmployee.edit',compact('vehicle'));

    }

    public function update (Request $request ,$id)
    {
        $vehicle = Vehicles::findOrfail($id);
        $name=$request->input('name');
        $type= $request->input('type');
        $capacity=$request->input('capacity');
        $availableStatus = $request->input('availableStatus');
        $quantity = $request->input('quantity');

        $vehicle->update([
            'name'=>$name,
            'type'=>$type,
            'capacity'=>$capacity,
            'availableStatus'=>$availableStatus,
            'quantity'=>$quantity,
            'createdBy'=>Auth()->guard('empolyee')->user()->id,

        ]);
        return redirect()->back()->with('successMessage', 'Vehicle Updated Successfully');
    }

    public function archive()
    {
        $vehicle = Vehicles::onlyTrashed()->get();
        return view('Employee.GarageEmployee.archive' , compact('vehicle'));
    }

    public function softDelete($id)
    {
        $vehicle = Vehicles::findOrfail($id);
        $vehicle->delete();
        return redirect()->back()->with('successMessage', 'Vehicle Deleted Successfully');
    }


    public function restore($id)
    {
        Vehicles::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('successMessage', 'Vehicle Restored Successfully');
    }

    public function fourceDelete($id)
    {
        $vehicle = Vehicles::withTrashed()->where('id', $id)->first();
        if ($vehicle) {
            $vehicle->forceDelete();

            return redirect()->back()->with('successMessage', 'Vehicle Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Vehicle  Not Found');
        }
    }
}
