<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserStatus;
use App\Traits\AlertTrait;

class SurfaceUserController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyAdminId = Auth::user()->id;
        $users = User::where('role', 'user')
            ->orderBy('first_name', 'asc')
            ->paginate(15);
        return view('admin.surface-users.surface-user-index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        $statuses = UserStatus::orderBy('name', 'asc')->get();
        return view('admin.surface-users.surface-user-edit', compact(['user', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = $request->id;
        $orgId = Auth::user()->id;

        if (!$userId) {
            return back();
        }

        $user = User::where('id', $userId)
            ->where('role', 'user')->firstOrFail();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'status' => 'required'
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->email = $request->email;
        $user->status = $request->status;

        $user->save();

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
