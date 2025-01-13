<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{

    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgs = User::where('role', 'orgadmin')->orderBy('first_name', 'asc')->paginate(15);
        return view('admin.organization.org-view', compact(['orgs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization.org-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:users,first_name',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        $org = new User();

        $org->first_name = $request->name;
        $org->phone = $request->phone;
        $org->email = $request->email;
        $org->address = $request->address;
        $org->password = $org->password ? Hash::make($org->password) : Hash::make('123456');
        $org->unique_ref = $this->generateUniqueCode();
        $org->full_name_slug = Str::slug($request->name);
        $org->role = 'orgadmin';

        $org->save();

        return redirect()
            ->route('manage.org.index')
            ->with($this->successAlert('Successfully Created Organization!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $org = User::findOrFail($id);
        $statuses = UserStatus::orderBy('name', 'asc')->get();
        return view('admin.organization.org-edit', compact(['org', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $orgId = $request->id;
        if (!$orgId) {
            return back();
        }

        $org = User::findOrFail($orgId);

        $request->validate([
            'name' => 'required|min:3|unique:users,first_name,' . $org->id,
            'email' => 'required|email|unique:users,email,' . $org->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->password) {
            $org->password = Hash::make($request->password);
        }

        $org->first_name = $request->name;
        $org->phone = $request->phone;
        $org->email = $request->email;
        $org->full_name_slug = Str::slug($request->name);
        $org->status = $request->status;

        $org->save();

        return back()->with($this->successAlert('Successfully Updated!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $org = User::findOrFail($id);
        $org->delete();
        return back()->with($this->successAlert('Successfully Deleted!'));
    }

    public function view (string $id)
    {
        $org = User::findOrFail($id);
        $orderCount = Order::where('org_id', $id)->count();
        return view('admin.organization.org-details', compact(['org', 'orderCount']));
    }


    //Org Member...

    public function orgMember ()
    {
        $orgMembers = User::where('role', 'orgmember')->with('organization')->orderBy('first_name', 'asc')->paginate(15);
        return view('admin.organization.org-member', compact(['orgMembers']));
    }

    public function createMember ()
    {
        return view('admin.organization.org-member-add');
    }

    public function storeMember (Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'org_id' => 'required'
        ]);

        $orgMember = new User();

        if ($request->password) {
            $orgMember->password = Hash::make($request->password);
        }

        $orgMember->unique_ref = $this->generateUniqueCode();
        $orgMember->first_name = $request->first_name;
        $orgMember->last_name = $request->last_name;
        $orgMember->phone = $request->phone;
        $orgMember->email = $request->email;
        $orgMember->full_name_slug = Str::slug($request->name);
        $orgMember->org_id = $request->org_id;
        $orgMember->role = "orgmember";

        $orgMember->save();

        return back()->with($this->successAlert('Successfully Added!'));
    }

    public function editMember (string $id)
    {
        $orgMember = User::findOrFail($id);
        $statuses = UserStatus::orderBy('name', 'asc')->get();
        return view('admin.organization.org-member-edit', compact(['orgMember', 'statuses']));
    }

    public function updateMember (Request $request)
    {
        $orgId = $request->id;
        if (!$orgId) {
            return back();
        }

        $org = User::findOrFail($orgId);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $org->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->password) {
            $org->password = Hash::make($request->password);
        }

        $org->first_name = $request->first_name;
        $org->last_name = $request->last_name;
        $org->phone = $request->phone;
        $org->email = $request->email;
        $org->full_name_slug = Str::slug($request->name);
        $org->status = $request->status;

        $org->save();

        return back()->with($this->successAlert('Successfully Updated!'));
    }

    public function viewMember (string $id)
    {
        $orgMember = User::findOrFail($id);
        $orderCount = Order::where('affiliate_id', $orgMember->unique_ref)->count();
        return view('admin.organization.org-member-details', compact(['orgMember', 'orderCount']));
    }
}
