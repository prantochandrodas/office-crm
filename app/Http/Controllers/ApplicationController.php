<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->can('application')) {
                $data = Application::first();
                return view('application.index', compact('data'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }


    public function update(Request $request, $id)
    {
       
        $request->validate([
            'company_name' => 'nullable|string|max:200',
            'company_email' => 'nullable|email',
            'address' => 'nullable|string',
            'about_company' => 'nullable|string',
            'phone' => 'nullable',
            'logo' => 'nullable|image|file|max:2048',
            'fav_icon' => 'nullable|image|file|max:2048',

        ]);

        $data = Application::findOrFail($id);
        //    chairman image  
        if ($request->hasFile('fav_icon')) {
            $oldImagePath = public_path('image/' . $data->fav_icon);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('fav_icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $data->fav_icon = $filename;
        }
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('image/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $data->logo = $filename;
        }


        $data->company_name = $request->company_name;
        $data->company_email = $request->company_email;
        $data->address = $request->address;
        $data->about_company = $request->about_company;
        $data->phone = $request->phone;

        if (auth()->check()) {
            if (auth()->user()->can('application-update')) {
                $data->save();
                return redirect()->route('applications.index')->with('Data updated successfull');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to update and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
        
       
    }
}
