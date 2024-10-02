<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(){
        if (auth()->check()) {
            if (auth()->user()->can('send-sms')) {
                return view('backend.send_sms.index');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
      
    }

    public function sendSms(Request $request){
        if (auth()->check()) {
            if (auth()->user()->can('send-sms')) {
                $request->validate([
                    'phone' => 'required',
                    'message' => 'required'
                ]);
                try {
                    // Attempt to send the SMS
                    send_bl_sms($request->phone, $request->message);
            
                    // If successful, redirect back with a success message
                    return redirect()->back()->with('success', 'Message sent successfully');
                } catch (\Exception $e) {
                    // If an error occurs, redirect back with an error message
                    return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
                }
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to send-mail and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }  
    }

    
    public function multipleSms(Request $request){
        if (auth()->check()) {
            if (auth()->user()->can('send-sms')) {
                $request->validate([
                    'message' => 'required|string',
                    'client_status' => 'required',
                    'client_name' => 'required',
                ]);
                if ($request->client_name === 'all') {
                    // Fetch all clients based on the selected client_status
                    $clients = Customer::where('status', $request->client_status)->get();
                } else {
                    // Fetch the specific client
                    $clients = Customer::where('id', $request->client_name)->get();
                }
        
                foreach ($clients as $client) {
                    send_bl_sms($client->phone, $request->message);
                }
                return redirect()->back()->with('success', 'Message sent successfully');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to send-sms and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
       
    }
}
