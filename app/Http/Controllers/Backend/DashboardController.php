<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        if (auth()->check()) {
            if (auth()->user()->can('dashboard')) {
                $projects=Project::all();
                $clients=Customer::all();
                $primaryClient=Customer::where('status',6)->get();
                $contactClients=Customer::where('status',1)->get();
                $wantedClient=Customer::where('status',2)->get();
                $ourClient=Customer::where('status',3)->get();
                $nonprospectiveclients=Customer::where('status',5)->get();
                $locations=Location::all();
                return view('backend.dashboard.index',compact('locations','primaryClient','projects','clients','contactClients','wantedClient','ourClient','nonprospectiveclients'));
            } else {
                auth()->logout(); // Log out the user
            return redirect()->route('login')->with('error', 'You do not have permission to view the dashboard and have been logged out.');
            }
        }else {
            return redirect()->back()->with('error','You need to login first.');
        }
        
    }
}
