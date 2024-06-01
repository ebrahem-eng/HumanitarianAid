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

    // public function showListReceipt()
    // {
    //     $AidRecieptCampaigns = AidRecieptCampaigns::all();
    //     return view('Employe.AidReceivingEmployee.ShowListReceipt', compact('AidRecieptCampaigns'));
    // }

    public function showListReceipt()
    {
        $newAidReceivingEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
        $newAidReceivingEmployes = AidRecieptCampaigns::with('CampaignStaff')->whereIn('id' , $newAidReceivingEmployeIDS)->where('status',0)->get();

        return view('Employe.AidReceivingEmployee.ShowListReceipt' , compact('newAidReceivingEmployes'));
    }

    
    public function createNewRecipientList(Request $id)
    {
        $newAidReceivingEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
        $newAidReceivingEmployes = AidRecieptCampaigns::with('CampaignStaff')->whereIn('id' , $newAidReceivingEmployeIDS)->where('status',0)->get();
        return view('Employe.AidReceivingEmployee.creatNewList' , compact('newAidReceivingEmployes','id'));
    }

    public function storeNewRecipientList(Request $request)
    {
        $AidReceiptID=$request->input('AidReceiptID');
        $CampaignStaffReceivingAidID =$request->input('CampaignStaffReceivingAidID');
        $LocationsForAidReceivingCampaignsID = $request->input('LocationsForAidReceivingCampaignsID');
        $aidType = $request->input('aidType');
        $quantity= $request->input('quantity');
        $note= $request->input('note');


        AidRecivedFromAidRecivingCampaigns::create([
            'AidReceiptID'=>$AidReceiptID,
            'CampaignStaffReceivingAidID'=>$CampaignStaffReceivingAidID,
            'LocationsForAidReceivingCampaignsID'=>$LocationsForAidReceivingCampaignsID,
            'aidType'=>$aidType,
            'quantity'=>$quantity,
            'note'=>$note,

        ]);
        return redirect()->back()->with('successMessage', 'The List of Receipts Created Successfully');

    }

    public function showPreviousReceipt()
    {
        $newAidReceivingEmployeIDS = AidRecivedFromAidRecivingCampaigns::where('AidReceiptID' , Auth::guard('employe')->user()->id)->pluck('CampaignStaffReceivingAidID');
        $newAidReceivingEmployes = AidRecieptCampaigns::with('CampaignStaff')->whereIn('id' , $newAidReceivingEmployeIDS)->where('status',0)->get();
        return view('Employe.AidReceivingEmployee.ShowListsOfPreviousReceipts' , compact('newAidReceivingEmployes'));
    }

    public function showListRejectedReceipt(Request $id)
    {
        $AidReceivingEmployes = AidRecieptCampaigns::all();

        return view('Employe.AidReceivingEmployee.ListOfRejectedReceipts' , compact('AidReceivingEmployes'));
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


    //================== craete an account for donor ========


    public function createAccount()
    {
        return view('Employe.AidReceivingEmployee.createAcoount');
    }

    public function storeAccount (Request $request)
    {
        $name=$request->input('name');
        $email =$request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status= $request->input('status');
        $age= $request->input('age');
        $phone= $request->input('phone');
        $address= $request->input('address');
        $img=$request->input('img');

        Donor::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'gender'=>$gender,
            'status'=>$status,
            'age'=>$age,
            'phone'=>$phone,
            'address'=>$address,
            'img'=> $img,
            'createdBy'=>Auth()->guard('employee')->user()->id,

        ]);
        return redirect()->back()->with('successMessage', 'Donor Created Successfully');

    }


    

}
