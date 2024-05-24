<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AidReceivingEmployeController extends Controller
{
    //

    public function index()
    {
        return view('Employe.AidReceivingEmploye.index');
    }

    // public function newReconnaissanceIndex()
    // {
    //     $newAidReceivingEmployeIDS = AidReceivingEmployeController::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('ReconnaissanceToursID');
    //     $newAidReceivingEmployeIDS = AidReceivingEmployeController::with('ReconnaissanceToursEmployee')->whereIn('id' , $newReconnaissanceEmployeIDS)->where('status',0)->get();
    //     // return $newReconnaissanceEmployes;
    //     return view('Employe.ReconnaissanceEmploye.newReconnaissanceTable' , compact('newReconnaissanceEmployes'));
    // }
}
