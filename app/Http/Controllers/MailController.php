<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ClientMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        if (auth()->check()) {
            if (auth()->user()->can('send-email')) {
                return view('backend.mail_client.index');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to send-mail and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
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

    public function multipleMail(Request $request){
        if (auth()->check()) {
            if (auth()->user()->can('send-email')) {
                $request->validate([
                    'subject' => 'required|string|max:255',
                    'message' => 'required|string',
                    'client_status' => 'required',
                    'client_name' => 'required'
                ]);
                
                // dd($request->client_name);
                // If 'All Clients' is selected, send email to all clients with the selected client_status
                if ($request->client_name === 'all') {
                    // Fetch all clients based on the selected client_status
                    $clients = Customer::where('status', $request->client_status)->get();
                } else {
                    // Fetch the specific client
                    $clients = Customer::where('id', $request->client_name)->get();
                }
            
                foreach ($clients as $client) {
                    // Logic to send email to each client
                    Mail::to($client->email)->send(new ClientMail($request->message, $client->email, $client->name,$request->subject));
                }
            
                return redirect()->back()->with('success', 'Mail sent successfully');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to send-mail and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }
}
