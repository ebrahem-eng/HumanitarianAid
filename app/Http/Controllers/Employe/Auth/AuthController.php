<?php

namespace App\Http\Controllers\Employe\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function index()
    {
        try {
            return view('Employe.Auth.login');
        } catch (\Exception $ex) {
            return redirect()->route('website.notfound');
        }
    }
       //التحقق من عملية تسجيل الدخول

       public function store(Request $request)
       {
           try {
               $check = $request->all();
               if (FacadesAuth::guard('employe')->attempt([
                   'email' => $check['email'],
                   'password' => $check['password']
               ])) {
                   $user = FacadesAuth::guard('employe')->user();
                   switch ($user->type) {
                       case 5:
                           return redirect()->route('employe.reconnaissance.index');
                       case 4:
                           return redirect()->route('employe.garageManager.index');
                       case 3:
                           return redirect()->route('employe.storeKeeper.index');
                       case 2:
                           return redirect()->route('employe.distributionAid.index');
                       case 1:
                           return redirect()->route('employe.receivingAid.index');
                       default:
                           return redirect()->route('employe.show.login')->with('login_error_message', 'error login please enter valid username and password');
                   }
               } else {
                   return redirect()->route('employe.show.login')->with('login_error_message', 'error login please enter valid username and password');
               }
           } catch (\Exception $e) {
               return redirect()->route('website.notFound')->with('error_message', 'An unexpected error occurred.');
           }
       }       
   
       //تسجيل الخروج
   
       public function logout()
       {
           try {
               FacadesAuth::guard('employe')->logout();
               return redirect()->route('employe.show.login');
           } catch (\Exception $ex) {
               return redirect()->route('website.notfound');
           }
       }
}
