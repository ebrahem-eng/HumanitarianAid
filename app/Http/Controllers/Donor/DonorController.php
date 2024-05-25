<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Employee;
use Illuminate\Http\Request;

class DonorController extends Controller
{

    public function index()
    {
       return view('Donor.index');
    }

    public function profile($id)
    {
        $donor = Donor::findOrfail($id);
        return view('Donor.profile' , compact('donor'));
    }

    public function profileUpdate(Request $request , $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $donor = Donor::findOrfail($id);
        $donor->update([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'age' => $age,
            'phone' => $phone,
            'address' => $address,
        ]);

        return redirect()->back()->with('successMessage' , 'Profile Updating Successfully');

    }

}
