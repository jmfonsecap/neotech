<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Leave a review';

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        Review::validate($request);

        $rev = new Review();

        $rev->setRating($request->input('rating'));
        $rev->setDescription($request->input('description'));

        $rev->save();

        return view('review.save');
    }
}