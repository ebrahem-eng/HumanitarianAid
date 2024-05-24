<?php

namespace App\Http\Controllers\Admin\RequestsToIdentifyThoseInNeed;

use App\Http\Controllers\Controller;
use App\Models\RequestsToIdentifyThoseInNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsToIdentifyThoseInNeedController extends Controller
{
    
    public function index()
    {
       $IdentifyThoseInNeeds = RequestsToIdentifyThoseInNeed::all();
       return view('Admin.RequestsToIdentifyThoseInNeed.index' , compact('IdentifyThoseInNeeds'));

    }

    public function seen($id)
    {
         $IdentifyThoseInNeed = RequestsToIdentifyThoseInNeed::findOrfail($id);
         if($IdentifyThoseInNeed)
         {
            $IdentifyThoseInNeed->update([
                'status' => '1',
                'ReceivedBy' => Auth::guard('admin')->user()->id,
            ]);

            return redirect()->back()->with('successMessage' , 'Request Answared Successfully');
         }
         return redirect()->back()->with('errorMessage' , 'Request Not Found');
    }

    public function archive()
    {
        $IdentifyThoseInNeeds = RequestsToIdentifyThoseInNeed::onlyTrashed()->get();
        return view('Admin.RequestsToIdentifyThoseInNeed.archive' , compact('IdentifyThoseInNeeds'));
    }

    public function softDelete($id)
    {
        $IdentifyThoseInNeed = RequestsToIdentifyThoseInNeed::findOrFail($id);

        $IdentifyThoseInNeed->delete();

        return redirect()->route('admin.IdentifyThoseInNeed.index')->with('successMessage', 'Request Deleted Successfully');
    }

    public function forceDelete($id)
    {
        $IdentifyThoseInNeed = RequestsToIdentifyThoseInNeed::withTrashed()->where('id', $id)->first();
        if ($IdentifyThoseInNeed) {

            $IdentifyThoseInNeed->forceDelete();

            return redirect()->route('admin.IdentifyThoseInNeed.archive')->with('successMessage', 'Request Deleted Successfully');
        } else {
            return redirect()->back()->with('errorMessage', 'Request  Not Found');
        }
    }

    public function restore($id)
    {
        RequestsToIdentifyThoseInNeed::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.IdentifyThoseInNeed.archive')->with('successMessage', 'Request Restored Successfully');
    }
}
