<?php

namespace App\Http\Controllers\Employe\StoreKeeperEmploye;

use App\Http\Controllers\Controller;
use App\Models\Aid;
use App\Models\AidRecieptCampaigns;
use App\Models\Employee;
use Illuminate\Http\Request;

class StoreKeeperEmployeController extends Controller
{
    //
    public function index()
    {
        return view('Employe.StoreKeeper.index');
    }

    public function storeKeeperEmployeProfile($id)
    {

        $storeKeeperEmployes = Employee::findOrfail($id);

        return view('Employe.StoreKeeper.profile' , compact('storeKeeperEmployes'));

    }

    public function storeKeeperEmployeProfileUpdate(Request $request , $id)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $address = $request->input('address');

        $employe = Employee::findOrfail($id);

        $employe->update([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'address' => $address,
        ]);

        return redirect()->back()->with('suceessMessage' , 'Profile Updated Successfully');
    }

    public function aidIndex()
    {
        $aids = Aid::all();
        return view('Employe.StoreKeeper.Aid.index' , compact('aids'));
    }

    public function aidDelete(Request $request , $id)
    {

        $aid = Aid::findOrfail($id);
        $quantityDeleted = $request->input('quantity');
        $originalQuantity = $aid->quantity;

        if($quantityDeleted > $originalQuantity)
        {
            return redirect()->back()->with('errorMessage' , 'Error The Quantity Is Larger Than The Original');
        }else if($quantityDeleted < $originalQuantity)
        {
             $newQuantity = $originalQuantity - $quantityDeleted;
             $aid->update([
                'quantity' => $newQuantity
             ]);
             return redirect()->back()->with('successMessage' , 'Aid Deleted Successfully');
        }
        else if($quantityDeleted == $originalQuantity)
        {
             $aid->delete();
             return redirect()->back()->with('successMessage', 'Aid Deleted Successfully');
        }

    }

    public function aidEdit($id)
    {
        $aid = Aid::findOrfail($id);

        return view('Employe.StoreKeeper.Aid.edit' , compact('aid'));
    }

    public function aidUpdate(Request $request , $id)
    {
        $aid = Aid::findOrfail($id);
        $name = $request->input('name');
        $type = $request->input('type');
        $note = $request->input('note');
        $quantity = $request->input('quantity');

        $aid->update([
            'name' => $name,
            'type' => $type,
            'note' => $note,
            'quantity' => $quantity
        ]);

        return redirect()->back()->with('successMessage', 'Aid Updated Successfully');
    }
}
