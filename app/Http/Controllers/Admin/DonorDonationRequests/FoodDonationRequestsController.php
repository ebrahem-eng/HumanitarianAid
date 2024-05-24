<?php

namespace App\Http\Controllers\Admin\DonorDonationRequests;

use App\Http\Controllers\Controller;
use App\Models\FoodDonationRequests;
use Illuminate\Http\Request;

class FoodDonationRequestsController extends Controller
{
    //

    public function index()
    {
        $foodDonations = FoodDonationRequests::all();
        return view('Admin.DonorDonationRequests.FoodDonationRequests.index' , compact('foodDonations'));
    }

    public function delete($id)
    {
        $foodDonation = FoodDonationRequests::findOrfail($id);
        $foodDonation->delete();
        return redirect()->back()->with('successMessage', 'Food Donation Deleted Successfully');
    }

}
