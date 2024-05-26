<?php

namespace App\Http\Controllers\Donor\Donate;

use App\Http\Controllers\Controller;
use App\Models\ClothingDonationRequests;
use App\Models\FoodDonationRequests;
use App\Models\MedicalSuppliesDonationRequests;
use App\Models\RequestsForMoneyDonations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonateController extends Controller
{
    //

    public function index()
    {
        return view('Donor.donate');
    }

    public function donateHistory()
    {
        $moneyDonations = RequestsForMoneyDonations::where('donorID' , Auth::guard('donor')->user()->id)->get();
        $medicalDonations = MedicalSuppliesDonationRequests::where('donorID' , Auth::guard('donor')->user()->id)->get();
        $clothingDonations = ClothingDonationRequests::where('donorID' , Auth::guard('donor')->user()->id)->get();
        $foodDonations = FoodDonationRequests::where('donorID' , Auth::guard('donor')->user()->id)->get();
        return view('Donor.donateHistory' , compact('moneyDonations' , 'medicalDonations' , 'clothingDonations' , 'foodDonations'));
    }

    public function donateMedical(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'note' => 'required|string|max:1000',
            'titer' => 'required|integer',
            'expiration' => 'required|date|after:today',
        ]);

        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $note = $request->input('note');
        $titer = $request->input('titer');
        $expiration = $request->input('expiration');
        $donorID = Auth::guard('donor')->user()->id;

        MedicalSuppliesDonationRequests::create([
            'name' => $name,
            'quantity' => $quantity,
            'note' => $note,
            'titer' => $titer,
            'expiration' => $expiration,
            'donorID' => $donorID,
        ]);

        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    public function donateClothing(Request $request)
    {

        $request->validate([
            'clotheType' => 'required',
            'quantity' => 'required|integer|min:1',
            'age' => 'required|integer',
            'size' => 'required|string',
        ]);

        $clotheType = $request->input('clotheType');
        $quantity = $request->input('quantity');
        $age = $request->input('age');
        $size = $request->input('size');
        $donorID = Auth::guard('donor')->user()->id;

        ClothingDonationRequests::create([
            'clotheType' => $clotheType,
            'quantity' => $quantity,
            'age' => $age,
            'size' => $size,
            'donorID' => $donorID
        ]);
        
        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    public function donateMoney(Request $request)
    {
        $amount = $request->input('amount');
        $invoiceNumber = mt_rand(10000, 99999);
        $date = Carbon::now()->format('Y-m-d H:i:s');

        RequestsForMoneyDonations::create([
         'amount' => $amount,
         'date' => $date,
         'invoiceNumber' => $invoiceNumber,
         'donorID' => Auth::guard('donor')->user()->id,
        ]);

        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    public function donateFood(Request $request)
    {

        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $expiration = $request->input('expiration');

        FoodDonationRequests::create([
        'name' => $name,
         'quantity' => $quantity,
         'boxSize' => $size,
          'expiration' => $expiration,
          'donorID' => Auth::guard('donor')->user()->id,
        ]);

        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    public function donateMoneyCancele($id)
    {
        $moneyDonate = RequestsForMoneyDonations::findOrfail($id);

        $moneyDonate->update([
            'status' => '2'
        ]);

        return redirect()->back()->with('successMessage', 'Donation Canceled Successfully');

    }

    public function donateClothingCancele($id)
    {
        $clothingDonate = ClothingDonationRequests::findOrfail($id);

        $clothingDonate->update([
            'status' => '2'
        ]);

        return redirect()->back()->with('successMessage', 'Donation Canceled Successfully');

    }

    public function donateMedicalCancele($id)
    {
        $medicalDonate = MedicalSuppliesDonationRequests::findOrfail($id);

        $medicalDonate->update([
            'status' => '2'
        ]);

        return redirect()->back()->with('successMessage', 'Donation Canceled Successfully');

    }

    public function donateFoodCancele($id)
    {
        $foodDonate = FoodDonationRequests::findOrfail($id);

        $foodDonate->update([
            'status' => '2'
        ]);

        return redirect()->back()->with('successMessage', 'Donation Canceled Successfully');

    }
    
}
