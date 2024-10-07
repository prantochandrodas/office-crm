<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\ConversationLog;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerProject;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Project;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class CustomerController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->can('client')) {
                $customers = Customer::all();
                $divisions = Division::all();
                $serviceCategories = ServiceCategory::all();
                return view('backend.customer.index', compact('customers', 'divisions', 'serviceCategories'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }


    public function getdata(Request $request)
    {
        $status = $request->input('status'); // Default to 0 if not provided
        $division_id = $request->input('division_id');
        $district_id = $request->input('district_id');
        $location_id = $request->input('location_id');
        $service_category_id = $request->input('service_category');
        $project_id = $request->input('project_id');

        $model = Customer::orderBy('created_at', 'desc');

        // dd($status);
        if ($status) {
            $model->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            });
        }
        if ($location_id) {
            $model->when($location_id, function ($query) use ($location_id) {
                $query->where('location_id', $location_id);
            });
        }
        if ($division_id) {
            $model->when($division_id, function ($query) use ($division_id) {
                $query->whereHas('location', function ($query) use ($division_id) {
                    $query->where('division_id', $division_id);
                });
            });
        }

        if ($district_id) {

            $model->when($district_id, function ($query) use ($district_id) {
                $query->whereHas('location', function ($query) use ($district_id) {
                    $query->where('district_id', $district_id);
                });
            });
        }
        if ($service_category_id) {
            $model->when($service_category_id, function ($query) use ($service_category_id) {
                $query->whereHas('customerProjects.project.serviceCategory', function ($query) use ($service_category_id) {
                    $query->where('id', $service_category_id);
                });
            });
        }
        if ($project_id) {
            $model->when($project_id, function ($query) use ($project_id) {
                $query->whereHas('projects', function ($query) use ($project_id) {
                    $query->where('project_id', $project_id);
                });
            });
        }

        $customers = $model;
        // $customers = $model->toSql();

        // dd($customers);
        if ($request->ajax()) {
            // $data = Customer::where('status', 0)->orderBy('created_at', 'desc')->get();
            return DataTables::of($customers)
                ->addColumn('action', function ($row) {
                    $editBtn = '';
                    $deleteBtn = '';
                    $addContactClient = '';
                    $addNonProspective = '';
                    $viewConversation = '';

                    $editUrl = route('all-clients.edit', $row->id);
                    $deleteUrl = route('all-clients.distroy', $row->id);
                    $csrfToken = csrf_field();
                    $method = method_field('DELETE');

                    if (auth()->user()->can('add-to-contact-client')) {
                        $addContactClient = '<span data-id="' . $row->id . '" style="cursor:pointer; padding:10px; font-size:13px" class="add-contact-client badge rounded-pill text-bg-primary text-light ms-2">Add To Contact Client</span>';
                    }

                    if (auth()->user()->can('add-to-non-prospective-client')) {
                        $addNonProspective = '<span data-id="' . $row->id . '" style="cursor:pointer;padding:10px; font-size:13px" class="add-nonprospective badge rounded-pill text-bg-danger text-light ms-2">Add To Non Prospective</span>';
                    }


                    if (auth()->user()->can('conversation-create')) {
                        $addConversation = '<button class="btn btn-sm btn-primary ms-2 add-conversation" style="padding: 8px;" data-customer-id="' . $row->id . '"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span>
                        <svg viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#ffffff" style="width:20px; height:20px;">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>comment 3</title>
                                <desc>Created with Sketch Beta.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                    <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-207.000000, -257.000000)" fill="#ffffff">
                                        <path d="M231,273 C229.896,273 229,272.104 229,271 C229,269.896 229.896,269 231,269 C232.104,269 233,269.896 233,271 C233,272.104 232.104,273 231,273 L231,273 Z M223,273 C221.896,273 221,272.104 221,271 C221,269.896 221.896,269 223,269 C224.104,269 225,269.896 225,271 C225,272.104 224.104,273 223,273 L223,273 Z M215,273 C213.896,273 213,272.104 213,271 C213,269.896 213.896,269 215,269 C216.104,269 217,269.896 217,271 C217,272.104 216.104,273 215,273 L215,273 Z M223,257 C214.164,257 207,263.269 207,271 C207,275.419 209.345,279.354 213,281.919 L213,289 L220.009,284.747 C220.979,284.907 221.977,285 223,285 C231.836,285 239,278.732 239,271 C239,263.269 231.836,257 223,257 L223,257 Z" id="comment-3" sketch:type="MSShapeGroup"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        </span></button>';
                    }
                    if (auth()->user()->can('view-conversation')) {
                        $viewConversation = '<button class="btn btn-sm ms-2 view-conversation" style="padding: 8px; background-color:#6c757d" data-customer-id="' . $row->id . '"  data-bs-toggle="modal" data-bs-target="#viewConversationdrop">
                    <span>
                    <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <circle cx="367.5" cy="85.6" r="51.3"></circle> <path d="M367.5,160.6c-67.7,0-122.5,54.8-122.5,122.5h245C490,215.4,435.2,160.6,367.5,160.6z"></path> <circle cx="122.5" cy="292.1" r="51.3"></circle> <path d="M122.5,367.5C54.8,367.5,0,422.3,0,490h245C245,422.3,190.2,367.5,122.5,367.5z"></path> <path d="M217,180.4V131h31.1V0H22.6v131.1h142.7L217,180.4z M196,55.6h5.1c5.4,0,10.1,4.3,10.1,10.1s-4.3,10.1-10.1,10.1H196 c-5.4,0-10.1-4.3-10.1-10.1S190.6,55.6,196,55.6z M74.7,75.4h-5.1c-5.4,0-10.1-4.3-10.1-10.1c0-5.8,4.3-10.1,10.1-10.1h5.1 c5.4,0,10.1,4.3,10.1,10.1C84.8,71.2,80.1,75.4,74.7,75.4z M137.7,75.4h-5.1c-5.4,0-10.1-4.3-10.1-10.1c0-5.8,4.3-10.1,10.1-10.1 h5.1c5.4,0,10.1,4.3,10.1,10.1C147.8,71.2,143.1,75.4,137.7,75.4z"></path> </g> </g> </g> </g></svg>
                    </span></button>';
                    }


                    if (auth()->user()->can('client-edit')) {
                        $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-sm btn-success me-2 rounded" style="padding:8px;"><span>' .
                            '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">' .
                            '<g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"></path> </g></svg>' .
                            '</span></a>';
                    }

                    if (auth()->user()->can('client-delete')) {
                        $deleteBtn = '<form action="' . $deleteUrl . '" method="POST">
                    ' . $csrfToken . '
                    ' . $method . '
                                <button type="submit" class="delete btn btn-danger btn-sm" style="padding:8px;">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                                            <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        </button>
                            </form>';
                    }

                    return '<div class="d-flex align-items-center justify-content-center mb-2">'
                        . $editBtn . $deleteBtn . $addConversation . $viewConversation .
                        '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }





    public function getProjects($serviceCategoryId)
    {
        // Fetch projects based on the selected service category
        $projects = Project::where('service_category_id', $serviceCategoryId)->get();

        // Return the projects as a JSON response
        return response()->json($projects);
    }

    public function create()
    {
        if (auth()->check()) {
            if (auth()->user()->can('client-create')) {
                $divisions = Division::all();
                $projects = Project::all();
                $locations = Location::all();
                $serviceCategories = ServiceCategory::all();
                return view('backend.customer.create', compact('projects', 'locations', 'divisions', 'serviceCategories'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to create and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'company_name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable|string',
            'note' => 'nullable|string',
            'designation' => 'nullable|string',
            'location_id' => 'nullable|integer|exists:locations,id', // Validate project IDs
            'projects.*' => 'nullable|integer|exists:projects,id', // Validate project IDs
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
            'status' => 6,
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
        // $statuses = $request->input('statuses');
        $notes = $request->input('notes', []);


        foreach ($projects as $index => $projectId) {
            CustomerProject::create([
                'customer_id' => $customer->id,
                'project_id' => $projectId,
                'note' => $notes[$index] ?? null, // Use null if note is not provided
            ]);
        }


        return redirect()->route('all-clients')->with('success', 'Data created successfully');
    }


    public function edit($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('client-edit')) {
                $customer = Customer::with('projects')->findOrFail($id);
                $locations = Location::all();
                $divisions = Division::all();
                $location = Location::find($customer->location_id);
                $selectedDivisionId = $location->division_id; // Assuming district belongs to division
                $selectedDistrictId = $location->district_id;
                $selectedLocationId = $location->id;

                // Load districts based on the selected division
                $districts = District::where('division_id', $selectedDivisionId)->get();

                // Load locations based on the selected district
                $locations = Location::where('district_id', $selectedDistrictId)->get();
                // Fetch all available projects
                $projects = Project::all();
                $serviceCategory = ServiceCategory::all();
                return view('backend.customer.edit', compact('customer', 'projects', 'locations', 'divisions', 'districts', 'locations', 'selectedDivisionId', 'selectedDistrictId', 'selectedLocationId', 'serviceCategory'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to edit and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }






    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'nullable|string|max:255',
            'company_name' => 'nullable|string',
            'note' => 'nullable|string',
            'location_id' => 'nullable|integer|exists:locations,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|numeric',
            'designation' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'project_ids.*' => 'nullable|exists:customer_projects,id',
            'projects.*' => 'nullable|exists:projects,id',
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
        $notes = $request->input('notes', []);


        // Update or create associated projects
        // Update or create associated projects
        foreach ($projects as $index => $projectId) {
            if ($projectId) {
                $customerProjectData = [
                    'project_id' => $projectId,
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
        return redirect()->route('all-clients')->with('success', 'Customer updated successfully');
    }


    public function distroy($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('client-delete')) {
                $customer = Customer::findOrFail($id);
                CustomerProject::where('customer_id', $customer->id)->delete();
                ConversationLog::where('customer_id', $customer->id)->delete();
                $customer->delete();
                return redirect()->route('all-clients')->with('success', 'Customer deleted successfully');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to edit and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            // Update the status
            $customer->status = $request->input('status');
            $customer->save();

            return response()->json(['message' => 'Status updated successfully']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }

    public function getCustomerData($id)
    {
        $customer = Customer::find($id);
        $projects = $customer->demo; // Fetch all projects, or filter as needed
        $conversationLogs = ConversationLog::where('customer_id', $customer->id)->with('project', 'customer')->get();
        return response()->json([
            // 'conversationLogs' => $conversationLogs,
            'customer' => $customer,
            'projects' => $projects,
            'conversationLogs' => $conversationLogs
        ]);
    }

    // ClientController.php
    public function getClientEmail($id)
    {
        // Find the client by ID
        $client = Customer::find($id);

        // Return the email if the client exists, otherwise return null
        if ($client) {
            return response()->json(['email' => $client->email, 'phone' => $client->phone]);
        } else {
            return response()->json(['email' => null, 'phone' => null]);
        }
    }
    public function getClient($id)
    {
        // Find the client by ID
        if ($id == 'all') {
            $client = Customer::all();
        } else {
            $client = Customer::where('status', $id)->get();
        }


        // Return the email if the client exists, otherwise return null
        if ($client) {
            return response()->json(['client' => $client]);
        } else {
            return response()->json(['client' => null]);
        }
    }

    public function getClientDetails($id)
    {
        $client = Customer::find($id); // Adjust model and logic as per your setup
        return response()->json(['client' => $client]);
    }
}
