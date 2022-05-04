<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\Review;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index() {
        $book = BookDetail::all();
        return view('index', compact('book'));
    }

    public function show($id) {
        $book_detail = BookDetail::find($id);
        return view('user.book.show', compact('book_detail'));
    }

    public function store(Request $request) {
        $review = new Review;
        $review->user_id = '1'; //test
        $review->book_id = $request->book_id;
        $review->rating = $request->star;
        $review->comment = $request->comment;
        $review->save();

        dd($review);
    }
}
