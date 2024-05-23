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
}
