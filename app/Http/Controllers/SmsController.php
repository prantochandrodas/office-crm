<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(Request $request){
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
    }
}
