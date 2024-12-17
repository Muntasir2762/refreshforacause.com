<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CategoryStatus;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    use AlertTrait;

    public function index()
    {
        $campaigns = Campaign::orderBy('name', 'asc')->paginate(15);
        $statuses = CategoryStatus::orderBy('name', 'asc')->get();
        return view('admin.campaign.campaign-index', compact(['campaigns', 'statuses']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:campaigns,name',
            'status' => 'required'
        ]);

        $campaign = new Campaign();

        $campaign->name = $request->name;
        $campaign->slug = Str::slug($request->name);
        $campaign->status = $request->status;

        $campaign->save();

        return redirect()
            ->route('manage.campaigns.index')
            ->with($this->successAlert('Successfully Created!'));
    }

    public function edit(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        $statuses = CategoryStatus::orderBy('name', 'asc')->get();
        return view('admin.campaign.campaign-edit', compact(['campaign', 'statuses']));
    }

    public function update(Request $request)
    {
        $campaignId = $request->id;
        if (!$campaignId) {
            return back();
        }

        $request->validate([
            'name' => 'required|min:3|max:100|unique:campaigns,name,' . $campaignId,
            'status' => 'required'
        ]);

        $campaign = Campaign::findOrFail($campaignId);

        $campaign->name = $request->name;
        $campaign->slug = Str::slug($request->name);
        $campaign->status = $request->status;

        $campaign->save();

        return redirect()
            ->route('manage.campaigns.index')
            ->with($this->successAlert('Successfully Updated!'));
    }
}
