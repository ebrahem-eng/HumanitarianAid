<?php

namespace App\Http\Controllers\Donor\Donate;

use App\Http\Controllers\Controller;
use App\Models\ClothingDonationRequests;
use app\Models\FoodDonationRequests;
use App\Models\MedicalSuppliesDonationRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonateController extends Controller
{
    //

    public function index()
    {
        return view('Donor.donate');
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

    public function donateFood(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'boxSize' => 'required|string',
            'expiration' => 'required|string',
        ]);

        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $boxSize = $request->input('boxSize');
        $expiration=$request->input('expiration');
        $donorID = Auth::guard('donor')->user()->id;

        FoodDonationRequests::create([
            'name' => $name,
            'quantity' => $quantity,
            'boxSize' => $boxSize,
            'expiration' => $expiration,
            'donorID' => $donorID
        ]);
        
        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    public function donateMoney(Request $request)
    {

        $request->validate([
            'amount' => 'required|double',
            'date' => 'required|string',
            'invoiceNumber' => 'required|integer',
        ]);

        $amount = $request->input('amount');
        $date = $request->input('date');
        $invoiceNumber = $request->input('invoiceNumber');
        $donorID = Auth::guard('donor')->user()->id;

        FoodDonationRequests::create([
            'amount' => $amount,
            'date' => $date,
            'invoceNumber' => $invoiceNumber,
            'donorID' => $donorID
        ]);
        
        return redirect()->back()->with('successMessage', 'Donation Successfully');
    }

    


}
