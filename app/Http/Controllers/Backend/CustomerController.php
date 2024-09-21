<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerProject;
use App\Models\Location;
use App\Models\Project;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class CustomerController extends Controller
{
    public function index()
    {
        return view('backend.customer.index');
    }


    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('customers.edit', $row->id);
                    $deleteUrl = route('customers.distroy', $row->id);
                    $csrfToken = csrf_field();
                    $method = method_field('DELETE');


                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-sm btn-success me-2 rounded" style="padding:8px;"><span>' .
                        '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">' .
                        '<g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"></path> </g></svg>' .
                        '</span></a>';
                    $deleteBtn = '<form action="' . $deleteUrl . '" method="POST">
                    ' . $csrfToken . '
                    ' . $method . '
                    <button type="submit" class="delete btn btn-danger btn-sm" style="padding:8px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                                <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            </button>
                </form>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create()
    {
        $projects = Project::all();
        $locations=Location::all();
        return view('backend.customer.create', compact('projects','locations'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'designation' => 'required|string',
            'location_id' => 'required|integer|exists:locations,id', // Validate project IDs
            'projects.*' => 'required|integer|exists:projects,id', // Validate project IDs
            'statuses.*' => 'required|string|in:interested,want-to-buy,purchased', // Validate statuses
            'notes.*' => 'nullable|string', // Validate notes
        ]);


        // Generate new customer ID
        $year = Carbon::now()->year;
        $lastCustomer = Customer::where('customer_id', 'like', 'C-' . $year . '%')->orderBy('customer_id', 'desc')->first();
        $nextId = $lastCustomer ? intval(substr($lastCustomer->customer_id, 6)) + 1 : 1;
        $newId = 'C-' . $year . str_pad($nextId, 2, '0', STR_PAD_LEFT);


        // Create the new customer
        $customer = Customer::create([
            'customer_id' => $newId,
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'location_id' => $request->input('location_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'designation' => $request->input('designation'),
        ]);


        // Save the projects, statuses, and notes
        $projects = $request->input('projects');
        $statuses = $request->input('statuses');
        $notes = $request->input('notes', []);


        foreach ($projects as $index => $projectId) {
            CustomerProject::create([
                'customer_id' => $customer->id,
                'project_id' => $projectId,
                'status' => $statuses[$index] ?? null, // Use null if status is not provided
                'note' => $notes[$index] ?? null, // Use null if note is not provided
            ]);
        }


        return redirect()->route('customers')->with('success', 'Data created successfully');
    }


    public function edit($id)
    {
        // Fetch the customer with their associated projects
        $customer = Customer::with('projects')->findOrFail($id);
        $locations=Location::all();

        // Fetch all available projects
        $projects = Project::all();


        return view('backend.customer.edit', compact('customer', 'projects','locations'));
    }






    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string',
            'note' => 'nullable|string',
            'location_id' => 'required|integer|exists:locations,id',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'designation' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'project_ids.*' => 'nullable|exists:customer_projects,id',
            'projects.*' => 'nullable|exists:projects,id',
            'statuses.*' => 'nullable|in:interested,want-to-buy,purchased',
            'notes.*' => 'nullable|string',
        ]);


        // Find the customer
        $customer = Customer::findOrFail($id);


        // Update customer details
        $customer->update([
            'name' => $request->input('name'),
            'location_id' => $request->input('location_id'),
            'note' => $request->input('note'),
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'designation' => $request->input('designation'),
            'address' => $request->input('address'),
        ]);


        // Get project data
        $projectIds = $request->input('project_ids', []);
        $projects = $request->input('projects', []);
        $statuses = $request->input('statuses', []);
        $notes = $request->input('notes', []);


        // Update or create associated projects
        // Update or create associated projects
        foreach ($projects as $index => $projectId) {
            if ($projectId) {
                $customerProjectData = [
                    'project_id' => $projectId,
                    'status' => $statuses[$index] ?? null,
                    'note' => $notes[$index] ?? null,
                ];


                // If a project_id exists in the form, update the existing project
                if (isset($projectIds[$index]) && $projectIds[$index]) {
                    CustomerProject::where('id', $projectIds[$index])->update($customerProjectData);
                } else {
                    // If no project_id exists in the form, create a new project entry
                    $customer->projects()->create($customerProjectData);
                }
            }
        }


        // Remove any projects that are no longer assigned
        CustomerProject::where('customer_id', $customer->id)
            ->whereNotIn('id', $projectIds)
            ->delete();


        // Redirect back with success message
        return redirect()->route('customers')->with('success', 'Customer updated successfully');
    }


    public function distroy($id)
    {
        // Find the customer by ID
        $customer = Customer::findOrFail($id);


        // Delete associated projects
        CustomerProject::where('customer_id', $customer->id)->delete();


        // Delete the customer
        $customer->delete();


        // Redirect back with success message
        return redirect()->route('customers')->with('success', 'Customer deleted successfully');
    }
}



