<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    // عرض الصفحة الرئيسية للموقع

    public function index()
    {
        try {

            return view('WebSite.index');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function about()
    {
        try {
            return view('WebSite.about');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function projects()
    {
        try {
            return view('WebSite.projects');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function events()
    {

        try {
            return view('WebSite.events');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function service()
    {
        try {
            return view('WebSite.service');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function donate()
    {
        try {
            return view('WebSite.donate');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function team()
    {
        try {
            return view('WebSite.team');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function donors()
    {
        try {
            return view('WebSite.donors');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function contact()
    {
        try {
            return view('WebSite.contact');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function login()
    {
        try {
            return view('WebSite.login');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }

    }

    public function signUp()
    {
        try {
            return view('WebSite.register');
        } catch (\Exception $ex) {
            // return view('WebSite.404');
            return redirect()->route('notFound');
        }
    }

    public function notFound()
    {
        return view('WebSite.404');
    }
}
