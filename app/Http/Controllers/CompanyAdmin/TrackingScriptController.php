<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use App\Models\TrackingScript;
use Illuminate\Http\Request;

class TrackingScriptController extends Controller
{
    public function index()
    {
        $categories = TrackingScript::get();
        return view('admin.tracking.index', compact('categories'));
    }
}
