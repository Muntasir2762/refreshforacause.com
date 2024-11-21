<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\AlertTrait;
use App\Traits\HelperTrait;

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
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        $user = new User();

        $user->first_name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $user->password ? Hash::make($user->password) : Hash::make('123456');
        $user->unique_ref = $this->generateUniqueCode();
        $user->full_name_slug = Str::slug($request->name);
        $user->role = 'orgadmin';

        $user->save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}
