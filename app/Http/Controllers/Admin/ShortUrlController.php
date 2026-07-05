<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function index()
    {
        $shortUrls = ShortUrl::where('company_id', auth()->user()->company_id)
            ->latest()
            ->paginate(10);

        return view('admin.short-urls.index', compact('shortUrls'));
    }

    public function create()
    {
        return view('admin.short-urls.create');
    }

    public function store(StoreShortUrlRequest $request)
    {
        ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code'   => Str::random(6),
            'company_id'   => auth()->user()->company_id,
            'created_by'   => auth()->id(),
        ]);

        return redirect()
            ->route('admin.short-urls.index')
            ->with('success', 'Short URL created successfully.');
    }

    public function edit(ShortUrl $shortUrl)
    {
        abort_if($shortUrl->company_id != auth()->user()->company_id, 403);
        return view('admin.short-urls.edit', compact('shortUrl'));
    }

    public function update(UpdateShortUrlRequest $request, ShortUrl $shortUrl)
    {
        abort_if($shortUrl->company_id != auth()->user()->company_id, 403);
        $shortUrl->update([
            'original_url' => $request->original_url,
        ]);

        return redirect()
            ->route('admin.short-urls.index')
            ->with('success', 'Short URL updated successfully.');
    }

    public function destroy(ShortUrl $shortUrl)
    {
        abort_if($shortUrl->company_id != auth()->user()->company_id, 403);
        $shortUrl->delete();

        return redirect()
            ->route('admin.short-urls.index')
            ->with('success', 'Short URL deleted successfully.');
    }
}
