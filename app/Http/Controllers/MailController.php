<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ClientMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        return view('backend.mail_client.index');
    }

    public function sendMail(Request $request)
    {

        if (auth()->check()) {
            if (auth()->user()->can('send-email')) {
                // Validate input
                $request->validate([
                    'client_name' => 'required|exists:customers,id', // Ensure it exists in the customers table
                    'email' => 'required|email',
                    'message' => 'required',
                    'subject' => 'required',
                ]);

                // Get client ID from the request
                $clientId = $request->client_name;

                // Retrieve client details from the database
                $client = Customer::find($clientId);

                if (!$client) {
                    return back()->withErrors(['client_name' => 'Client not found.']);
                }

                // Get client email and message from the request
                $clientEmail = $request->email;
                $messageContent = $request->message;
                $clientName = $client->name; // Get the client's name
                $subject = $request->subject;
                // Send the email
                Mail::to($clientEmail)->send(new ClientMail($messageContent, $clientEmail, $clientName,$subject));

                // Redirect or return response
                return back()->with('success', 'Mail sent successfully.');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to send email and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }
}
