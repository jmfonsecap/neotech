<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function create(string $comp_id): View
    {
        $viewData = [];
        $viewData['title'] = 'Create review';
        $viewData['computer_id'] = $comp_id;
        session()->put('user_id', auth()->id());

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request, string $computerId): View
    {
        Review::validate($request);

        $rev = new Review();

        $rev->setComputerId($computerId);
        $rev->setUserId(session()->get('user_id'));
        $rev->setRating($request->input('rating'));
        $rev->setDescription($request->input('description'));

        $rev->save();

        return view('review.save');
    }
}
