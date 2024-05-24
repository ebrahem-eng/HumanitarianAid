<?php

namespace App\Http\Controllers\Donor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        try {
            return view('WebSite.index');
        } catch (\Exception $ex) {
            return redirect()->route('website.notfound');
        }
    }

       //التحقق من عملية تسجيل الدخول

       public function store(Request $request)
       {
           try {
               $check = $request->all();
               if (FacadesAuth::guard('donor')->attempt([
                   'email' => $check['email'],
                   'password' => $check['password']
               ])) {
   
                   return redirect()->route('donor.index');
               } else {
                   return redirect()->route('donor.show.login')->with('login_error_message', 'error login please enter valid username and password');
               }
           } catch (\Exception) {
               return redirect()->route('website.notfound');
           }
       }

       public function signUp(Request $request)
       {
           try {
          
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $age = $request->input('age');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $gender = $request->input('gender');

            Donor::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'phone' => $phone,
                'age' => $age,
                'gender' => $gender,
                'address' => $address,
                'status' => '1',
            ]);
            return redirect()->route('website.login')->with('successMessage' , 'Account Created Successfully');
               } 
            catch (\Exception) {
               return redirect()->route('website.notfound');
           }
       }
   
       //تسجيل الخروج
   
       public function logout()
       {
           try {
               FacadesAuth::guard('donor')->logout();
               return redirect()->route('donor.show.login');
           } catch (\Exception $ex) {
               return redirect()->route('website.notfound');
           }
       }


       // تعديل الملف الشخصي
    public function edit_profile($id)
    {
        $donor = Donor::findOrfail($id);
        return view('Website.edit_profile',compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrfail($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $donor->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'age' => $age,
            'phone' => $phone,
            'address' => $address,

        ]);
        return redirect()->back()->with('successMessage', 'Donor Updated Successfully');
    }

      // تغير كلمة المرور

    // public function changePasswordPage($id)
    // {
    //     $employee = Employee::findOrfail($id);
    //     return view('Admin.Employee.changePassword' , compact('employee'));
    // }

    // public function changePassword(Request $request , $id)
    // {
    //     $association = Employee::findOrfail($id);
    //     $password = $request->input('password');
    //     $association->update([
    //         'password' => Hash::make($password),
    //     ]);
    //     return redirect()->back()->with('successMessage', 'Employee Password Changed Successfully');
    // }
}
