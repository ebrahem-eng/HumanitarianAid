<?php

namespace App\Http\Controllers\Admin\DonorDonationRequests;

use App\Http\Controllers\Controller;
use App\Models\MedicalSuppliesDonationRequests;
use Illuminate\Http\Request;

class MedicalSuppliesDonationRequestsController extends Controller
{
    //

    public function index()
    {
        $medicalSupplieses = MedicalSuppliesDonationRequests::all();
        return view('Admin.DonorDonationRequests.MedicalSuppliesDonationRequests.index' , compact('medicalSupplieses'));
    }

    public function delete($id)
    {
        $medicalSupplieses = MedicalSuppliesDonationRequests::findOrfail($id);
        $medicalSupplieses->delete();
        return redirect()->back()->with('successMessage', 'Medical Supplieses Deleted Successfully');
    }

}
