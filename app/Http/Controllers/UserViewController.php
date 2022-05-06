<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserViewController extends Controller
{
    public function index() {
        $book = BookDetail::all();
        return view('index', compact('book'));
    }

    public function show($id) {
        $user_id = session('user')->id;
        $book_detail = BookDetail::find($id);
        $reviews = Review::where('book_id', $id)->get();
        $your_review  = Review::where('user_id', $user_id)->where('book_id', $id)->first();

        return view('user.book.show', compact('book_detail', 'reviews', 'your_review'));
    }

    public function store(Request $request) {
        $review = new Review;
        $review->user_id = $request->user_id;
        $review->book_id = $request->book_id;
        $review->rating = $request->star;
        $review->comment = $request->comment;

        Session::flash('add', $review->save());
        return back()->with('status', 'Your review has been added!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'star'      => ['required'],
            'comment'   => ['required']
        ], [
            'required'  => "You can't leave this field blank!"
        ]);

        $review = Review::findOrFail($id);
        $review->rating = $request->star;
        $review->comment = $request->comment;

        Session::flash('edit', $review->save());
        return back()->with('status', 'Your review has been updated successfully!');
    }
}
