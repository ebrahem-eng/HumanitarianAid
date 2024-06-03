<?php

namespace App\Http\Controllers\Employe\AidReceivingEmploye;

use App\Http\Controllers\Controller;
use App\Models\AidRecieptCampaigns;
use App\Models\AidRecivedFromAidRecivingCampaigns;
use App\Models\CampaignStaffReceivingAid;
use App\Models\Donor;
use App\Models\Employee;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AidReceivingEmployeController extends Controller
{
    //

    public function index()
    {
        return view('Employe.AidReceivingEmployee.index');
    }

    public function newReceivingAid()
    {
        $newAidReceivingEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
        $newAidReceivings = AidRecieptCampaigns::whereIn('id' , $newAidReceivingEmployeIDS)->where('status',0)->get();

        return view('Employe.AidReceivingEmployee.NewReceiptAid' , compact('newAidReceivings'));
    }

    
    public function createAid(Request $request)
    {
        $aidReceivingID = $request->input('aidReceivingID');
        $aidReceiving = AidRecieptCampaigns::findOrfail($aidReceivingID);
        return view('Employe.AidReceivingEmployee.creatNewAid' , compact('aidReceivingID' , 'aidReceiving'));
    }

    public function storeAidForReceivingAid(Request $request , $id)
    {
        $aidReceivingID  = $id;
        $StaffReceivingID = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->where('AidReceiptID' ,$aidReceivingID )->value('id');
        foreach ($request->name as $index => $name) {
            AidRecivedFromAidRecivingCampaigns::create([
                'name' => $name,
                'aidType' => $request->aidType[$index],
                'quantity' => $request->quantity[$index],
                'note' => $request->note[$index] ?? null,
                'LocationID' => $request->LocationsForAidReceivingCampaignsID[$index],
                'StaffReceivingID' =>$StaffReceivingID ,
                'AidReceiptID' => $aidReceivingID,
            ]);
        }
             $aidReceiving = AidRecieptCampaigns::findOrFail($aidReceivingID);
             $aidReceiving->update([
                'status' => '1',
             ]);

        return redirect()->back()->with('successMessage', 'The Aid For Aid Receiving Campaigns Created Successfully');

    }

    public function historyReceivingAid()
    {
        $AidReceivingEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
        $historyAidReceivings = AidRecieptCampaigns::whereIn('id' , $AidReceivingEmployeIDS)->where('status',1)->get();
        return view('Employe.AidReceivingEmployee.historyReceiptAid' , compact('historyAidReceivings'));
    }

    public function historyAidForReceivingAid($id)
    {
        $aidReceivingID  = $id;
        $aidForAidReceivings = AidRecivedFromAidRecivingCampaigns::where('AidReceiptID' , $aidReceivingID)->get() ;

        return view('Employe.AidReceivingEmployee.historyAidForReceiptAid' , compact('aidForAidReceivings'));
    }

    public function createDonor()
    {
        return view('Employe.AidReceivingEmployee.Donor.create');
    }

    public function storeDonor(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status = $request->input('status');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $address = $request->input('address');

        Donor::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'status' => $status,
            'age' => $age,
            'phone' => $phone,
            'address' => $address,
        ]);
        return redirect()->back()->with('successMessage', 'Donor Created Successfully');

    }


    //====================== profile =====================

    public function aidReceivingEmployeProfile($id)
    {

        $AidReceivingEmployes = Employee::findOrfail($id);

        return view('Employe.AidReceivingEmployee.profile' , compact('AidReceivingEmployes'));

    }

    public function aidReceivingEmployeProfileUpdate(Request $request , $id)
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
