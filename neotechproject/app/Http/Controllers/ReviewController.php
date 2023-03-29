<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function create(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Create review';
        $viewData['computer_id'] = $id;

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request, string $computerId): View
    {
        Review::validate($request);

        $rev = new Review();

        $rev->setComputerId($computerId);

        $rev->setRating($request->input('rating'));
        $rev->setDescription($request->input('description'));

        $rev->save();

        return view('review.save');
    }
}
