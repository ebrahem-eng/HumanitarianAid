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
   
                if(FacadesAuth::guard('employe')->user()->type == 5)
                {
                    return redirect()->route('employe.reconnaissance.index');
                }else if(FacadesAuth::guard('employe')->user()->type == 4)
                {
                    return redirect()->route('employe.garageManager.index');
                }
                else if(FacadesAuth::guard('employe')->user()->type == 3)
                {
                    return redirect()->route('employe.warehouseGuard.index');
                }
                else if(FacadesAuth::guard('employe')->user()->type == 2)
                {
                    return redirect()->route('employe.distributionAid.index');
                }
                else if(FacadesAuth::guard('employe')->user()->type == 1)
                {
                    return redirect()->route('employe.receivingAid.index');
                }

               } else {
                   return redirect()->route('employe.show.login')->with('login_error_message', 'error login please enter valid username and password');
               }
           } catch (\Exception) {
               return redirect()->route('website.notFound');
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
