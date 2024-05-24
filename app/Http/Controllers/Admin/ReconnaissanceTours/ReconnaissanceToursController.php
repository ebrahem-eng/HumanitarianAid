<?php

namespace App\Http\Controllers\Admin\ReconnaissanceTours;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\LocationOfTheReconnaissanceTour;
use App\Models\ReconnaissanceTours;
use App\Models\ReconnaissanceToursEmployees;
use App\Models\ReconnaissanceVehicles;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReconnaissanceToursController extends Controller
{
    //

    public function index()
    {
        $ReconnaissanceTours = ReconnaissanceTours::all();
        return view('Admin.ReconnaissanceTours.index', compact('ReconnaissanceTours'));
    }

    public function create()
    {
        return view('Admin.ReconnaissanceTours.create');
    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');

        $employees = Employee::where('type', 5)->get();

        return view('Admin.ReconnaissanceTours.createEmploye', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employees'));
    }

    public function storeEmploye(Request $request)
    {

        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');
        $employeIDs = $request->input('employeID', []);


        $vehicles = Vehicles::where('availableStatus', 1)->get();



        return view('Admin.ReconnaissanceTours.createVehicles', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicles'));
    }

    public function storeVehicles(Request $request)
    {

        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');
        $employeIDs = $request->input('employeIDs' , []);
        $vehicleIDs = $request->input('vehicleID' , []);

       
        return view('Admin.ReconnaissanceTours.createLocation', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicleIDs'));

    }

    public function storeAidRecieptCampaigns(Request $request)
    {
        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');
        
        $employeeIDs = $request->input('employeIDs', []);
        $vehicleIDs = $request->input('vehicleIDs', []);
        $addresses = $request->input('address', []);
        $streets = $request->input('street', []);
        $longitudes = $request->input('longitude', []);
        $latitudes = $request->input('latitude', []);
    
        $ReconnaissanceTours = ReconnaissanceTours::create([
            'name' => $name,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'priority' => $priority,
            'note' => $note,
            'createdBy' => Auth::guard('admin')->user()->id,
        ]);
    
        $ReconnaissanceToursID = $ReconnaissanceTours->id;
    
        // Iterate over the employee IDs and create separate records
        foreach ($employeeIDs as $employeeID) {
            ReconnaissanceToursEmployees::create([
                'employeeID' => (int) $employeeID,
                'ReconnaissanceToursID' => $ReconnaissanceToursID,
            ]);
        }
    
        // Iterate over the vehicle IDs and create separate records
        foreach ($vehicleIDs as $vehicleID) {
            ReconnaissanceVehicles::create([
                'vehicleID' => (int) $vehicleID,
                'ReconnaissanceToursID' => $ReconnaissanceToursID,
            ]);
        }
    
        // Iterate over the address data and create separate records
        for ($i = 0; $i < count($addresses); $i++) {
            LocationOfTheReconnaissanceTour::create([
                'ReconnaissanceID' => $ReconnaissanceToursID,
                'address' => $addresses[$i],
                'street' => $streets[$i],
                'longitude' => $longitudes[$i],
                'latitude' => $latitudes[$i],
            ]);
        }
    
        return redirect()->route('admin.ReconnaissanceTours.index')->with('successMessage', 'Reconnaissance Tours Created Successfully');
    }    
    

    public function edit($id)
    {
        $ReconnaissanceTours = ReconnaissanceTours::findOrfail($id);
        return view('Admin.ReconnaissanceTours.edit', compact('ReconnaissanceTours'));
    }

    public function update(Request $request, $id)
    {
        $AidRecieptCampaign = ReconnaissanceTours::findOrfail($id);
        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');

        $AidRecieptCampaign->update([
            'name' => $name,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'priority' => $priority,
            'note' => $note,
        ]);
        return redirect()->back()->with('successMessage', 'The Campaign Updated Successfully');
    }

    public function archive()
    {
        $ReconnaissanceTours = ReconnaissanceTours::onlyTrashed()->with('admin')->get();
        return view('Admin.ReconnaissanceTours.archive', compact('ReconnaissanceTours'));
    }

    public function softDelete($id)
    {
        $ReconnaissanceTours = ReconnaissanceTours::findOrFail($id);

        $ReconnaissanceTours->delete();

        return redirect()->route('admin.ReconnaissanceTours.index')->with('successMessage', 'Reconnaissance Tours Deleted Successfully');
    }

    public function forceDelete($id)
    {
        $ReconnaissanceTours = ReconnaissanceTours::withTrashed()->where('id', $id)->first();
        if ($ReconnaissanceTours) {

            $ReconnaissanceTours->forceDelete();

            return redirect()->route('admin.ReconnaissanceTours.archive')->with('successMessage', 'Reconnaissance Tours Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Reconnaissance Tours Not Found');
        }
    }

    public function restore($id)
    {
        ReconnaissanceTours::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.ReconnaissanceTours.archive')->with('successMessage', 'ReconnaissanceTours Restored Successfully');
    }
}
