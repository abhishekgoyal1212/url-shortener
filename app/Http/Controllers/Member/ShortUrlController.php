<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortUrls

            = ShortUrl::where('company_id', auth()->user()->company_id)
            ->latest()
            ->paginate(10);

        return view('member.short-urls.index', compact('shortUrls'));
    }

    public function create()
    {
        return view('member.short-urls.create');
    }

    public function store(StoreShortUrlRequest $request)
    {
        $data = $request->validated();

        $data['company_id'] = auth()->user()->company_id;

        $data['user_id'] = auth()->id();

        $data['short_code'] = Str::random(6);
        $data['created_by'] = auth()->id();
        

        ShortUrl::create($data);

        return redirect()
            ->route('short-urls.index')
            ->with('success', 'Short URL created successfully.')
            ->with('success', 'Short URL created successfully.');
    }

    public function edit(ShortUrl $shortUrl)
    {

        return view('member.short-urls.edit', compact('shortUrl'));
    }

    public function update(UpdateShortUrlRequest $request, ShortUrl $shortUrl)
    {
        abort_if($shortUrl->company_id != auth()->user()->company_id, 403);

        $shortUrl->update($request->validated());

        return redirect()
            ->route('short-urls.index')
            ->with('success', 'Updated successfully.');
    }

    public function destroy(ShortUrl $shortUrl)
    {
        abort_if($shortUrl->company_id != auth()->user()->company_id, 403);

        $shortUrl->delete();

        return redirect()
            ->route('short-urls.index')
            ->with('success', 'Deleted successfully.');
    }
}
