<?php

namespace App\Http\Controllers\Admin\DonorDonationRequests;

use App\Http\Controllers\Controller;
use App\Models\RequestsForMoneyDonations;
use Illuminate\Http\Request;

class RequestsForMoneyDonationsController extends Controller
{
    //

    public function index()
    {
        $moneyDonations = RequestsForMoneyDonations::all();
        return view('Admin.DonorDonationRequests.RequestsForMoneyDonations.index' , compact('moneyDonations'));
    }

    public function delete($id)
    {
        $moneyDonations = RequestsForMoneyDonations::findOrfail($id);
        $moneyDonations->delete();
        return redirect()->back()->with('successMessage', 'Money Donation Deleted Successfully');
    }
}
