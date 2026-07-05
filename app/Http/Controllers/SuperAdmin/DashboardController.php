<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\ShortUrl;

class DashboardController extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard', [
        'companies' => Company::count(),
        'admins' => User::admins()->count(),
        'members' => User::members()->count(),
        'shortUrls' => ShortUrl::count(),
    ]);
    }
}
