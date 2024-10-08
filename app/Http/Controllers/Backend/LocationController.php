<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->can('location')) {
                return view('backend.location.index');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view the locations and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }


    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Location::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('division', function ($row) {
                    return $row->division ? $row->division->name : 'N/A';
                })
                ->addColumn('district', function ($row) {
                    return $row->district ? $row->district->name : 'N/A';
                })
                ->addColumn('description', function ($row) {
                    return $row->description ? $row->description : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $actionBtns = '';
    
                    // Check if the user has 'location-edit' permission
                    if (auth()->user()->can('location-edit')) {
                        $editUrl = route('locations.edit', $row->id);
                        $actionBtns .= '<a href="' . $editUrl . '" class="edit btn btn-sm btn-success me-2 rounded" style="padding:8px;"><span>' .
                            '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">' .
                            '<g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"></path> </g></svg>' .
                            '</span></a>';
                    }
    
                    // Check if the user has 'location-delete' permission
                    if (auth()->user()->can('location-delete')) {
                        $deleteUrl = route('locations.distroy', $row->id);
                        $csrfToken = csrf_field();
                        $method = method_field('DELETE');
                        $actionBtns .= '<form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                            ' . $csrfToken . '
                            ' . $method . '
                            <button type="submit" class="delete btn btn-danger btn-sm" style="padding:8px;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                                <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            </button>
                        </form>';
                    }
    
                    return $actionBtns;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create()
    {
        if (auth()->check()) {
            if (auth()->user()->can('location-create')) {
                $divisions = Division::all();
                return view('backend.location.create', compact('divisions'));
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
        // Validate the request data
        $request->validate([
            'name' => 'nullable|string',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'description' => 'nullable|string'
        ]);

        Location::create([
            'name' => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'description' => $request->description
        ]);
        return redirect()->route('locations')->with('success', 'Data created successfully');
    }


    public function edit($id)
    {

        if (auth()->check()) {
            if (auth()->user()->can('location-edit')) {
                $data = Location::findOrFail($id);
                $divisions = Division::all();
                $districts = District::all();
                return view('backend.location.edit', compact('data', 'divisions', 'districts'));
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
            'name' => 'nullable|string',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'description' => 'nullable|string'
        ]);

        // Find the customer
        $data = Location::findOrFail($id);


        // Update customer details
        $data->update([
            'name' => $request->input('name'),
            'division_id' => $request->input('division_id'),
            'district_id' => $request->input('district_id'),
            'description' => $request->input('description'),
        ]);


        // Redirect back with success message
        return redirect()->route('locations')->with('success', 'Data updated successfully');
    }


    public function distroy($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('location-delete')) {
                $data = Location::findOrFail($id);
                $data->delete();
                return redirect()->route('locations')->with('success', 'Data deleted successfully');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to delete and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }

    public function getDistrict($id)
    {
        $data = District::where('division_id', $id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No district found'
            ], 404);
        } else {
            return response()->json($data);
        }
    }
}
