<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;

class SocialMediaController extends Controller
{

    use AlertTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = SocialMedia::orderBy('platform', 'asc')->get();
        return view('admin.social-media.social-media-index', compact(['media']));
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
    public function update(Request $request)
    {
        $hasOneUpdate = false;
        if ($request->platform && count($request->platform)) {
            foreach ($request->platform as $key => $value) {
                $media = SocialMedia::where('id', $key)->firstOrFail();
                if ($value != null && $media) {
                    $media->link = $value;
                    $media->save();
                    if (!$hasOneUpdate) {
                        $hasOneUpdate = true;
                    }
                }
            }
        }

        if ($hasOneUpdate) {
            return back()->with($this->successAlert('Successfully updated!'));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
