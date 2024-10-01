<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        if (auth()->check()) {
            if (auth()->user()->can('dashboard')) {
                $projects=Project::all();
                return view('backend.dashboard.index',compact('projects'));
            } else {
                auth()->logout(); // Log out the user
            return redirect()->route('login')->with('error', 'You do not have permission to view the dashboard and have been logged out.');
            }
        }else {
            return redirect()->back()->with('error','You need to login first.');
        }
        
    }
}
