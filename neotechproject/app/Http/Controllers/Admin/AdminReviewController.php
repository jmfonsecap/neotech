<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] =  __('admin.reviews.dashboard');
        $viewData['reviews'] = Review::all();

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $review = Review::findOrFail($id);
        $user = $review->user;
        $computerId = $review->getComputerId();
        $userId = $review->getUserId();
        $viewData['title'] = $review['id'].' - Neotech';
        $viewData['subtitle'] = $review['rating'].'/5';
        $viewData['description'] = $review['description'];
        $viewData['user'] = $user;
        $viewData['computer_id'] = $computerId;
        $viewData['user_id'] = $userId;
        $viewData['review'] = $review;

        return view('admin.review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create review';

        return view('admin.review.create')->with(['viewData' => $viewData, 'status' => 'created']);
    }

    public function save(Request $request): View
    {
        $review = new Review();
        Review::validate($request);
        $review->setRating($request->input('rating'));
        //$review->setPhoto($request->input('photo'));
        $review->setDescription($request->input('description'));
        $review->save();

        return view('admin.review.create')->with('status', 'created');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $review = Review::findOrFail($id);
        $viewData['title'] = 'Review'.$review['id'].' - Neotech';
        $viewData['review'] = $review;

        return view('admin.review.edit')->with('viewData', $viewData);
    }

    public function update(string $id, Request $request): View
    {
        $review = Review::findOrFail($id);
        $review->validate($request);
        //update
        Review::where('id', $id)->update($request->only(['rating', 'description']));

        return view('admin.review.show')->with('status', 'updated');
    }

    public function delete(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.reviews.dashboard');
        Review::findOrFail($id);
        Review::where('id', $id)->delete();
        $viewData['reviews'] = Review::all();

        return view('admin.review.index')->with('viewData', $viewData);
    }
}
