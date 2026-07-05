<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       return view('member.dashboard', [

        'shortUrls' => ShortUrl::where('company_id', auth()->user()->company_id)
            ->count(),

    ]);
    }
}
