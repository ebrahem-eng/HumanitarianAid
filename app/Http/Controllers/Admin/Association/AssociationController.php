<?php

namespace App\Http\Controllers\Admin\Association;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Association\ChangePasswordRequest;
use App\Http\Requests\Admin\Association\CreateRequest;
use App\Http\Requests\Admin\Association\UpdateLocationRequest;
use App\Http\Requests\Admin\Association\UpdateRequest;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssociationController extends Controller
{
    //

    public function index()
    {
        $associations = Association::all();
        return view('Admin.Association.index', compact('associations'));
    }

    public function create()
    {
        return view('Admin.Association.create');
    }

    public function store(CreateRequest $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $type = $request->input('type');
        $address = $request->input('address');
        $street = $request->input('street');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $details = $request->input('details');

        Association::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'type' => $type,
            'address' => $address,
            'street' => $street,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'anotherDetails' => $details,
            'createdBy' => Auth()->guard('admin')->user()->id,
        ]);

        return redirect()->back()->with('successMessage', 'Association Created Successfully');
    }

    public function edit($id)
    {
        $association = Association::findOrfail($id);
        return view('Admin.Association.edit', compact('association'));
    }

    public function update(UpdateRequest $request , $id)
    {
        $association = Association::findOrfail($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $type = $request->input('type');
        $address = $request->input('address');
        $street = $request->input('street');
        $details = $request->input('details');

        $association->update([
            'name' => $name,
            'email' => $email,
            'type' => $type,
            'address' => $address,
            'street' => $street,
            'anotherDetails' => $details,
        ]);
        return redirect()->back()->with('successMessage', 'Association Updated Successfully');
    }

    public function editLocation($id)
    {
        $association = Association::findOrfail($id);
        return view('Admin.Association.editLocation' , compact('association'));
    }

    public function updateLocation(UpdateLocationRequest $request , $id)
    {
        $association = Association::findOrfail($id);
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');

        $association->update([
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
        return redirect()->back()->with('successMessage', 'Association Location Updated Successfully');
    }

    public function changePasswordPage($id)
    {
        $association = Association::findOrfail($id);
        return view('Admin.Association.changePassword' , compact('association'));
    }

    public function changePassword(ChangePasswordRequest $request , $id)
    {
        $association = Association::findOrfail($id);
        $password = $request->input('password');
        $association->update([
            'password' => Hash::make($password),
        ]);
        return redirect()->back()->with('successMessage', 'Association Password Changed Successfully');
    }

    public function softDelete($id)
    {
        $association = Association::findOrfail($id);
        $association->delete();
        return redirect()->back()->with('successMessage', 'Association Deleted Successfully');
    }

    public function archive()
    {
        $associations = Association::onlyTrashed()->get();
        return view('Admin.Association.archive' , compact('associations'));
    }

    public function restore($id)
    {
        Association::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('successMessage', 'Association Restored Successfully');
    }

    public function fourceDelete($id)
    {
        $association = Association::withTrashed()->where('id', $id)->first();
        if ($association) {
            $association->forceDelete();

            return redirect()->back()->with('successMessage', 'Association Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Association  Not Found');
        }
    }
}
