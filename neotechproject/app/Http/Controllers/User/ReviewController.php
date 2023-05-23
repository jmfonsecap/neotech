<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{

    public function save(Request $request, string $computerId): RedirectResponse
    {
        Review::validate($request);

        $rev = new Review();
        session()->put('user_id', auth()->id());
        $rev->setComputerId($computerId);
        $rev->setUserId(session()->get('user_id'));
        $rev->setRating($request->input('rating'));
        $rev->setDescription($request->input('description'));

        $rev->save();

        return back()->with('success', 'Review saved successfully.');
    }
}
