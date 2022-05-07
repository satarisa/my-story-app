<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Review;
use App\Models\User;

class AdminViewController extends Controller
{
    public function index() {
        $total_book = Book::count();
        $total_user = User::count();
        $total_review = Review::count();
        $latest = BookDetail::latest()->first();
        return view('admin.menu', compact('total_book', 'total_user', 'total_review', 'latest'));
    }
}
