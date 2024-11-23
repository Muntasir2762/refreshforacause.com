<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;

class OrgMemberController extends Controller
{
    use AlertTrait, HelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgId = Auth::user()->id;
        $members = User::where('role', 'orgmember')
            ->where('org_id', $orgId)
            ->orderBy('first_name', 'asc')
            ->paginate(15);
        return view('admin.member.org-member-index', compact(['members']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.org-member-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        $member = new User();

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->password = $member->password ? Hash::make($member->password) : Hash::make('123456');
        $member->unique_ref = $this->generateUniqueCode();
        $member->full_name_slug = Str::slug($request->name . $request->last_name ? $request->last_name : '');
        $member->role = 'orgmember';
        $member->org_id = Auth::user()->id;

        $member->save();

        return redirect()
            ->route('manage.member.index')
            ->with($this->successAlert('Successfully Created Member!'));
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
        $orgId = Auth::user()->id;
        $member = User::where('id', $id)->where('org_id', $orgId)->firstOrFail();

        $statuses = UserStatus::orderBy('name', 'asc')->get();
        return view('admin.member.org-member-edit', compact(['member', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $memberId = $request->id;
        $orgId = Auth::user()->id;

        if (!$memberId) {
            return back();
        }

        $member = User::where('id', $memberId)
            ->where('org_id', $orgId)
            ->firstOrFail();

        $request->validate([
            'first_name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $member->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->password) {
            $member->password = Hash::make($request->password);
        }

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->full_name_slug = Str::slug($request->name . $request->last_name ? $request->last_name : '');
        $member->status = $request->status;

        $member->save();

        return back()->with($this->successAlert('Successfully Updated!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
