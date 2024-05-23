<?php

namespace App\Http\Controllers\Admin\DonorDonationRequests;

use App\Http\Controllers\Controller;
use App\Models\ClothingDonationRequests;
use Illuminate\Http\Request;

class ClothingDonationRequestsController extends Controller
{
    //

    public function index()
    {
        $clothingDonations = ClothingDonationRequests::all();
        return view('Admin.DonorDonationRequests.ClothingDonationRequests.index' , compact('clothingDonations'));
    }

    public function delete($id)
    {
        $clothingDonation = ClothingDonationRequests::findOrfail($id);
        $clothingDonation->delete();
        return redirect()->back()->with('successMessage', 'Clothing Donation Deleted Successfully');
    }

}
