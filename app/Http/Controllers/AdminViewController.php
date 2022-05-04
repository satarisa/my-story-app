<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookDetail;

class AdminViewController extends Controller
{
    public function index() {
        $total_book = Book::count();
        $latest = BookDetail::latest()->first();
        return view('admin.menu', compact('total_book', 'latest'));
    }
}
