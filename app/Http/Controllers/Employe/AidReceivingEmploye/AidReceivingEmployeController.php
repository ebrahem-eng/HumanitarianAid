<?php

namespace App\Http\Controllers\Employe\AidReceivingEmploye;

use App\Http\Controllers\Controller;
use App\Models\AidRecieptCampaigns;

use Illuminate\Http\Request;

class AidReceivingEmployeController extends Controller
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


    // public function newReconnaissanceIndex()
    // {
    //     $newReceivingAidEmployeIDS = CampaignStaffReceivingAid::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('AidReceiptID');
    //     $newReceivingAidEmployes = AidRecieptCampaigns::with('ReconnaissanceToursEmployee')->whereIn('id' , $newReceivingAidEmployeIDS)->where('status',0)->get();
    //     // return $newReconnaissanceEmployes;
    //     return view('Employe.AidReceivingEmployee.ListsOfAidReceived' , compact('newReceivingAidEmployes'));
    // }

}
