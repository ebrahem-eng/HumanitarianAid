<?php

namespace App\Http\Controllers\Admin\Donor;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view('Admin.Donor.index', compact('donors'));
    }

    public function create()
    {
        return view('Admin.Donor.create');
    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status = $request->input('status');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $address = $request->input('address');

        Donor::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'status' => $status,
            'age' => $age,
            'phone' => $phone,
            'address' => $address,
        ]);
        return redirect()->back()->with('successMessage', 'Donor Created Successfully');
    }

    public function edit($id)
    {
        $donor = Donor::findOrfail($id);
        return view('Admin.Donor.edit', compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrfail($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $status = $request->input('status');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $donor->update([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'status' => $status,
            'age' => $age,
            'phone' => $phone,
            'address' => $address,

        ]);
        return redirect()->back()->with('successMessage', 'Donor Updated Successfully');
    }

    public function archive()
    {
        $donors = Donor::onlyTrashed()->get();
        return view('Admin.Donor.archive', compact('donors'));
    }

    public function softDelete($id)
    {
        $donor = Donor::findOrFail($id);

        $donor->delete();

        return redirect()->route('admin.donor.index')->with('successMessage', 'Donor Deleted Successfully');
    }

    public function forceDelete($id)
    {
        $donor = Donor::withTrashed()->where('id', $id)->first();
        if ($donor) {

            $donor->forceDelete();

            return redirect()->route('admin.donor.archive')->with('successMessage', 'Donor Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Donor  Not Found');
        }
    }

    public function restore($id)
    {
        Donor::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.donor.archive')->with('successMessage', 'Donor Restored Successfully');
    }
}
