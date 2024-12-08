<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\TrackingScript;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;

class TrackingScriptController extends Controller
{
    use AlertTrait;

    const TRACKER_TYPES = [
        'Facebook',
        'Google'
    ];

    const TRACKER_POSITIONS = [
        'Head',
        'Script'
    ];

    public function index()
    {
        $trackingScripts = TrackingScript::orderBy('type', 'asc')->get();
        $trackerPositions = TrackingScriptController::TRACKER_POSITIONS;
        $trackerTypes = TrackingScriptController::TRACKER_TYPES;

        return view('admin.tracking.index', compact([
            'trackingScripts',
            'trackerPositions',
            'trackerTypes'
        ]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'position' => 'required|string',
            'script' => 'required|string'
        ]);

        $trackingScriptsCount = TrackingScript::count();

        if ($trackingScriptsCount >= 10) {
            return back()->with($this->errorAlert('You have more than 10 scripts. you are not allowed to add more!'));
        }

        $tracker = new TrackingScript();
        $tracker->fill($request->all());
        $tracker->save();

        return back()->with($this->successAlert('Successfully Created!'));
    }

    public function destroy(string $id)
    {
        $tracker = TrackingScript::findOrFail($id);
        $tracker->delete();
        return back()->with($this->successAlert('Successfully Deleted!'));
    }
}
