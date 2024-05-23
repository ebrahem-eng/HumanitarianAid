<?php

namespace App\Http\Controllers\Admin\AidRecieptCampaigns;

use App\Http\Controllers\Controller;
use App\Models\AidReceivingCampaignVehicles;
use Illuminate\Http\Request;
use App\Models\AidRecieptCampaigns;
use App\Models\CampaignStaffReceivingAid;
use App\Models\Employee;
use App\Models\LocationForAidReceivingCampaigns;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AidRecieptCampaignsController extends Controller
{
    //

    public function index()
    {
        $AidRecieptCampaigns = AidRecieptCampaigns::all();
        return view('Admin.AidReciept.index', compact('AidRecieptCampaigns'));
    }

    public function create()
    {
        return view('Admin.AidReciept.create');
    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');

        $employees = Employee::where('type', 1)->get();

        return view('Admin.AidReciept.createEmploye', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employees'));
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



        return view('Admin.AidReciept.createVehicles', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicles'));
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

       
        return view('Admin.AidReciept.createLocation', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicleIDs'));

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
    
        $AidRecieptCampaign = AidRecieptCampaigns::create([
            'name' => $name,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'priority' => $priority,
            'note' => $note,
            'createdBy' => Auth::guard('admin')->user()->id,
        ]);
    
        $AidRecieptCampaignID = $AidRecieptCampaign->id;
    
        // Iterate over the employee IDs and create separate records
        foreach ($employeeIDs as $employeeID) {
            CampaignStaffReceivingAid::create([
                'employeeID' => (int) $employeeID,
                'AidReceiptID' => $AidRecieptCampaignID,
            ]);
        }
    
        // Iterate over the vehicle IDs and create separate records
        foreach ($vehicleIDs as $vehicleID) {
            AidReceivingCampaignVehicles::create([
                'vehicleID' => (int) $vehicleID,
                'AidReceiptID' => $AidRecieptCampaignID,
            ]);
        }
    
        // Iterate over the address data and create separate records
        for ($i = 0; $i < count($addresses); $i++) {
            LocationForAidReceivingCampaigns::create([
                'AidReceiptID' => $AidRecieptCampaignID,
                'address' => $addresses[$i],
                'street' => $streets[$i],
                'longitude' => $longitudes[$i],
                'latitude' => $latitudes[$i],
            ]);
        }
    
        return redirect()->route('admin.AidRecieptCampaigns.index')->with('successMessage', 'Aid Receipt Campaigns Created Successfully');
    }    
    

    public function edit($id)
    {
        $AidRecieptCampaign = AidRecieptCampaigns::findOrfail($id);
        return view('Admin.AidReciept.edit', compact('AidRecieptCampaign'));
    }

    public function update(Request $request, $id)
    {
        $AidRecieptCampaign = AidRecieptCampaigns::findOrfail($id);
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
        $AidRecieptCampaigns = AidRecieptCampaigns::onlyTrashed()->with('admin')->get();
        return view('Admin.AidReciept.archive', compact('AidRecieptCampaigns'));
    }

    public function softDelete($id)
    {
        $AidRecieptCampaign = AidRecieptCampaigns::findOrFail($id);

        $AidRecieptCampaign->delete();

        return redirect()->route('admin.AidRecieptCampaigns.index')->with('successMessage', 'Aid Reciept Campaign Deleted Successfully');
    }

    public function forceDelete($id)
    {
        $AidRecieptCampaign = AidRecieptCampaigns::withTrashed()->where('id', $id)->first();
        if ($AidRecieptCampaign) {

            $AidRecieptCampaign->forceDelete();

            return redirect()->route('admin.AidRecieptCampaigns.archive')->with('successMessage', 'Aid Reciept Campaign Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Aid Reciept Campaign  Not Found');
        }
    }

    public function restore($id)
    {
        AidRecieptCampaigns::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.AidRecieptCampaigns.archive')->with('successMessage', 'Aid Reciept Campaign Restored Successfully');
    }
}
