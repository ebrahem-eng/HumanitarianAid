<?php

namespace App\Http\Controllers\Employe\ReconnaissanceEmploye;

use App\Http\Controllers\Controller;
use App\Models\ReconnaissanceTours;
use App\Models\ReconnaissanceToursEmployees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReconnaissanceEmployeController extends Controller
{
    //

    public function index()
    {
        return view('Employe.ReconnaissanceEmploye.index');
    }

    public function newReconnaissanceIndex()
    {
        $newReconnaissanceEmployeIDS = ReconnaissanceToursEmployees::where('employeeID' , Auth::guard('employe')->user()->id)->pluck('ReconnaissanceToursID');
        $newReconnaissanceEmployes = ReconnaissanceTours::with('ReconnaissanceToursEmployee')->whereIn('id' , $newReconnaissanceEmployeIDS)->where('status',0)->get();
        // return $newReconnaissanceEmployes;
        return view('Employe.ReconnaissanceEmploye.newReconnaissanceTable' , compact('newReconnaissanceEmployes'));
    }
}
