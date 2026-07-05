<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->company_id;

        $members = User::members()
            ->where('company_id', $companyId)
            ->count();

        $shortUrls = ShortUrl::where('company_id', $companyId)
            ->count();

        return view('admin.dashboard', compact('members', 'shortUrls'));
    }
}
