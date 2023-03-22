<?php

namespace App\Http\Controllers;

use App\Models\Computer;
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

    public function save(Request $request): View
    {
        Review::validate($request);

        $rev = new Review();

        $computer = Computer::findOrFail($request->computer_id);
        $rev->computer()->associate($computer);

        $rev->setRating($request->input('rating'));
        $rev->setDescription($request->input('description'));

        $rev->save();

        return view('review.save');
    }
}
