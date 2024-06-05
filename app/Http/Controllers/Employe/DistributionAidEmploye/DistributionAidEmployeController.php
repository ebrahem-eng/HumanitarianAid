<?php

namespace App\Http\Controllers\Employe\DistributionAidEmploye;

use App\Http\Controllers\Controller;
use App\Models\AidDistributionCampaignEmploye;
use App\Models\AidDistributionCampaigns;
use App\Models\AidForAidDistributionCampaigns;
use App\Models\Association;
use App\Models\Employee;
use App\Models\RequestsDeliverAidAssociation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistributionAidEmployeController extends Controller
{
    //

    public function index()
    {
        return view('Employe.DistributionAidEmploye.index');
    }

    public function newDistributionAid()
    {
        $newDistributionAidEmployeIDS = AidDistributionCampaignEmploye::where('employeeID', Auth::guard('employe')->user()->id)->pluck('AidDistributionID');
        $newDistributionAids = AidDistributionCampaigns::whereIn('id', $newDistributionAidEmployeIDS)->where('status', 1)->get();

        return view('Employe.DistributionAidEmploye.NewDistributionAids', compact('newDistributionAids'));
    }

    public function aidDistributionCampaignsAid($id)
    {
        $aidDistributionCampaignsID = $id;

        $aidForaidDistributionCampaigns = AidForAidDistributionCampaigns::where('AidDistributionID', $aidDistributionCampaignsID)->get();

        $associations = Association::all();

        return view('Employe.DistributionAidEmploye.aidDistributionCampaignsAid', compact('aidForaidDistributionCampaigns', 'aidDistributionCampaignsID', 'associations'));
    }

    public function aidDistributionCampaignsAidAcceptDelivery($id)
    {
        $aidForaidDistributionCampaignsID = $id;

        $aidForaidDistributionCampaigns = AidForAidDistributionCampaigns::findOrfail($aidForaidDistributionCampaignsID);

        $aidForaidDistributionCampaigns->update([
            'AidDeliveryStatus' => '1'
        ]);

        return redirect()->back()->with('successMessage', 'Aid Delivered Successfully');
    }

    public function aidDistributionCampaignsAidAcceptDeliveryAll($id)
    {

        $aidForaidDistributionCampaignsIDs = AidForAidDistributionCampaigns::where('AidDistributionID', $id)->pluck('id');

        $aidForaidDistributionCampaigns = AidForAidDistributionCampaigns::whereIn('id', $aidForaidDistributionCampaignsIDs)->get();

        foreach ($aidForaidDistributionCampaigns as $campaign) {
            $campaign->update(['AidDeliveryStatus' => 1]);
        }

        return redirect()->back()->with('successMessage', 'Aid Delivered Successfully');
    }


    public function aidDistributionCampaignsAidReturnedAid(Request $request, $id)
    {
        $aidForaidDistributionCampaignsID = $id;

        $aidForaidDistributionCampaigns = AidForAidDistributionCampaigns::findOrfail($aidForaidDistributionCampaignsID);

        $returnedQuantity = $request->input('returnedQuantity');

        $ReasonForReturn = $request->input('ReasonForReturn');

        $aidForaidDistributionCampaigns->update([
            'AidDeliveryStatus' => '3',
            'returnedQuantity' => $returnedQuantity,
            'ReasonForReturn' => $ReasonForReturn,
        ]);

        return redirect()->back()->with('successMessage', 'Aid Returned Successfully');
    }

    public function aidDistributionCampaignsAcceptReceipt($id)
    {
        $aidForaidDistributionCampaignsID = $id;

        $aidForaidDistributionCampaigns = AidForAidDistributionCampaigns::findOrfail($aidForaidDistributionCampaignsID);

        $aidForaidDistributionCampaigns->update([
            'ReceiptFromStoreKeeperStatus' => '1'
        ]);

        return redirect()->back()->with('successMessage', 'Aid Receipt Successfully');
    }

    public function aidDistributionCampaignsDeliveryToAssociation(Request $request, $id)
    {
        $aidForaidDistributionCampaignsID = $id;

        $quantity = $request->input('quantity');

        $note = $request->input('note');

        $associationID = $request->input('associationID');

        RequestsDeliverAidAssociation::create([
            'quantity' => $quantity,
            'note' => $note,
            'AssociationID' => $associationID,
            'AidDistributionID' => $aidForaidDistributionCampaignsID
        ]);

        return redirect()->back()->with('successMessage', 'Request Send Successfully To Association');
    }

    public function associationNewRequest()
    {
        $associationRequests = RequestsDeliverAidAssociation::where('receivingStatus' , 0)->get();
        return view('Employe.DistributionAidEmploye.AssociationRequest.newRequest' , compact('associationRequests'));
    }

    public function associationDeleteNewRequest($id)
    {
     $requestID = $id;

     $requestAssociation = RequestsDeliverAidAssociation::findOrfail($requestID);

     $requestAssociation->delete();

     return redirect()->back()->with('successMessage', 'Request Deleted Successfully');
    }

    public function associationHistoryRequest()
    {
        $associationRequests = RequestsDeliverAidAssociation::where('receivingStatus' ,'!=', 0)->get();
        return view('Employe.DistributionAidEmploye.AssociationRequest.historyRequest' , compact('associationRequests'));
    }

    public function showProfile($id)
    {

        $employeID = $id;
        $DistributionEmploye = Employee::findOrfail($employeID);

        return view('Employe.DistributionAidEmploye.profile' , compact('DistributionEmploye'));

    }

    public function updateProfile(Request $request , $id)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $address = $request->input('address');

        $employe = Employee::findOrfail($id);

        $employe->update([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'address' => $address,
        ]);

        return redirect()->back()->with('suceessMessage' , 'Profile Updated Successfully');
    }
}
