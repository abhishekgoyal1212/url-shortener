<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;


class RedirectController extends Controller
{
    public function index($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();

        return redirect()->away($shortUrl->original_url);
    }
}
