<?php

namespace App\Http\Controllers\Employe\CampaignStaffReceivingAid;
use App\Models\CampaignStaffReceivingAid;
use App\Models\AidRecieptCampaigns;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignStaffReceivingAidController extends Controller
{
    //
    public function index()
    {
        return view('Employe.AidReceivingEmployee.index');
    }

    
    public function show()
    {
        return view('Employe.AidReceivingEmployee.ListsOfAidReceived');
    }


    public function newReconnaissanceIndex()
    {
        $newReceivingAidEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
        $newReceivingAidEmployes = AidRecieptCampaigns::with('ReconnaissanceToursEmployee')->whereIn('id' , $newReceivingAidEmployeIDS)->where('status',0)->get();
        // return $newReconnaissanceEmployes;
        return view('Employe.AidReceivingEmployee.ListsOfAidReceived' , compact('newReceivingAidEmployes'));
    }
}
