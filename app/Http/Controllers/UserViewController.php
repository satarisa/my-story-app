<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserViewController extends Controller
{
    public function index() {
        // $book = BookDetail::all();
        $novels = Book::whereRelation('book_detail', 'type', 'Novel')->withCount('review')->orderBy('review_count', 'desc')->take(5)->get();
        $webcomics = Book::whereRelation('book_detail', 'type', 'Webcomic')->withCount('review')->orderBy('review_count', 'desc')->take(5)->get();
        return view('index', compact('novels', 'webcomics'));
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $books = BookDetail::join('books', 'books.id', '=', 'book_details.book_id')
                            ->where('books.title', 'like', '%'.$keyword.'%')
                            ->orWhere('books.author', 'like', '%'.$keyword.'%')
                            ->orderBy('books.title')
                            ->paginate(10);

        return view('user.category.search', compact('keyword', 'books'));
    }

    public function show($id) {
        if (!empty(session('user'))) {
            $user_id = session('user')->id;
            $book_detail = BookDetail::find($id);
            $reviews = Review::where('book_id', $id)->get();
            $your_review  = Review::where('user_id', $user_id)->where('book_id', $id)->first();
            $rate_avg = Review::where('book_id', $id)->avg('rating');
    
            return view('user.book.show', compact('book_detail', 'reviews', 'rate_avg', 'your_review'));
        } else {
            $book_detail = BookDetail::find($id);
            $reviews = Review::where('book_id', $id)->get();
            $rate_avg = Review::where('book_id', $id)->avg('rating');
    
            return view('user.book.show', compact('book_detail', 'reviews', 'rate_avg'));
        }
        
    }

    public function store(Request $request) {
        $request->validate([
            'star'      => ['required'],
            'comment'   => ['required']
        ], [
            'required'  => "You can't leave this field blank!"
        ]);
        
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

    public function browse() {
        $books = Book::orderBy('title')->get();
        return view('user.category.browse', compact('books'));
    }

    public function country($country) {
        $country_name = ucfirst($country);
        $books = BookDetail::where('country', $country_name)->paginate(10);
        return view('user.category.country', compact('country_name', 'books'));
    }

    public function genre($genre) {
        $genre_name = ucfirst($genre);
        $books = BookDetail::where('genre', $genre_name)->paginate(10);
        return view('user.category.genre', compact('genre_name', 'books'));
    }

    public function type($type) {
        $type_name = ucfirst($type);        
        $books = BookDetail::where('type', $type_name)->join('books', 'books.id', '=', 'book_details.book_id')->orderBy('books.title')->paginate(10);
        return view('user.category.type', compact('type_name', 'books'));
    }
}
