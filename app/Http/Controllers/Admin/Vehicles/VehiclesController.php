<?php

namespace App\Http\Controllers\Admin\Vehicles;

use App\Http\Controllers\Controller;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    //

    public function index()
    {
        $vehicles = Vehicles::all();
        return view('Admin.Vehicles.index' , compact('vehicles'));
    }
}
