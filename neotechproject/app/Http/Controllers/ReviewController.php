<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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

public function delete($id): RedirectResponse
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('computer.show')->with('success', 'Review deleted successfully');
    }

}
