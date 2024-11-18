<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;

class OrganizationController extends Controller
{

    use AlertTrait;
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
