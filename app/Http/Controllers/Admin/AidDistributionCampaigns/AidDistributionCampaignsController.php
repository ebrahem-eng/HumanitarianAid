<?php

namespace App\Http\Controllers\Admin\AidDistributionCampaigns;

use App\Http\Controllers\Controller;
use App\Models\Aid;
use App\Models\AidDistributionCampaignEmploye;
use App\Models\AidDistributionCampaigns;
use App\Models\AidDistributionCampaignVehicles;
use App\Models\AidForAidDistributionCampaigns;
use App\Models\Employee;
use App\Models\LocationOfAidDistributionCampaigns;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AidDistributionCampaignsController extends Controller
{
    //

    public function index()
    {
        $AidDistributionCampaigns = AidDistributionCampaigns::all();
        return view('Admin.AidDistribution.index', compact('AidDistributionCampaigns'));
    }

    public function create()
    {
        return view('Admin.AidDistribution.create');
    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');

        $employees = Employee::where('type', 2)->get();

        return view('Admin.AidDistribution.createEmploye', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employees'));
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



        return view('Admin.AidDistribution.createVehicles', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicles'));
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
        $aids = Aid::all();

       
        return view('Admin.AidDistribution.createAid', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicleIDs' , 'aids'));

    }

    public function storeAid(Request $request)
    {
        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');
        $employeIDs = $request->input('employeIDs' , []);
        $vehicleIDs = $request->input('vehicleIDs' , []);
        $aidIDs = $request->input('aidIDs' , []);
        $quantities = $request->input('quantities' , []);
        $notes = $request->input('notes' , []);

        
        return view('Admin.AidDistribution.createLocation', compact('name', 'date', 'startTime', 'endTime', 'priority', 'note', 'employeIDs', 'vehicleIDs' , 'aidIDs' , 'quantities' , 'notes'));
    }

    public function storeAidDistributionCampaigns(Request $request)
    {
        $name = $request->input('name');
        $date = $request->input('date');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $priority = $request->input('priority');
        $note = $request->input('note');
    
        $employeeIDs = $request->input('employeIDs', []);
        $vehicleIDs = $request->input('vehicleIDs', []);
        $aidIDs = $request->input('aidIDs', []);
        $quantities = $request->input('quantities', []);
        $notes = $request->input('notes', []);
        $addresses = $request->input('address', []);
        $streets = $request->input('street', []);
        $longitudes = $request->input('longitude', []);
        $latitudes = $request->input('latitude', []);
        
        $AidDistributionCampaign = AidDistributionCampaigns::create([
            'name' => $name,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'priority' => $priority,
            'note' => $note,
            'createdBy' => Auth::guard('admin')->user()->id,
        ]);
    
        $AidDistributionCampaignID = $AidDistributionCampaign->id;
    
        // Iterate over the employee IDs and create separate records
        foreach ($employeeIDs as $employeeID) {
            AidDistributionCampaignEmploye::create([
                'employeeID' => (int) $employeeID,
                'AidDistributionID' => $AidDistributionCampaignID,
            ]);
        }
    
        // Iterate over the vehicle IDs and create separate records
        foreach ($vehicleIDs as $vehicleID) {
            AidDistributionCampaignVehicles::create([
                'vehicleID' => (int) $vehicleID,
                'AidDistributionID' => $AidDistributionCampaignID,
            ]);
        }
    
        // Iterate over the aid IDs, quantities, and notes to create separate records
        for ($i = 0; $i < count($aidIDs); $i++) {
            AidForAidDistributionCampaigns::create([
                'AidDistributionID' => $AidDistributionCampaignID,
                'aidID' => (int) $aidIDs[$i],
                'quantity' => (int) $quantities[$i],
                'Note' => $notes[$i],
            ]);
        }
    
        // Iterate over the address data and create separate records
        for ($i = 0; $i < count($addresses); $i++) {
            LocationOfAidDistributionCampaigns::create([
                'AidDistributionID' => $AidDistributionCampaignID,
                'address' => $addresses[$i],
                'street' => $streets[$i],
                'longitude' => $longitudes[$i],
                'latitude' => $latitudes[$i],
            ]);
        }
    
        return redirect()->route('admin.AidDistributionCampaigns.index')->with('successMessage', 'Aid Distribution Campaigns Created Successfully');
    }

    public function archive()
    {
        $AidDistributionCampaigns = AidDistributionCampaigns::onlyTrashed()->with('admin')->get();
        return view('Admin.AidDistribution.archive', compact('AidDistributionCampaigns'));
    }

    public function softDelete($id)
    {
        $AidDistributionCampaign = AidDistributionCampaigns::findOrFail($id);

        $AidDistributionCampaign->delete();

        return redirect()->route('admin.AidDistributionCampaigns.index')->with('successMessage', 'Aid Distribution Campaigns Deleted Successfully');
    }

    public function forceDelete($id)
    {
        $AidDistributionCampaign = AidDistributionCampaigns::withTrashed()->where('id', $id)->first();
        if ($AidDistributionCampaign) {

            $AidDistributionCampaign->forceDelete();

            return redirect()->route('admin.AidDistributionCampaigns.archive')->with('successMessage', 'Aid Distribution Campaigns Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Aid Distribution Campaigns Not Found');
        }
    }

    public function restore($id)
    {
        AidDistributionCampaigns::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.AidDistributionCampaigns.archive')->with('successMessage', 'Aid Distribution Campaigns Restored Successfully');
    }
    


}
