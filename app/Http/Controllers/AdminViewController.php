<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminViewController extends Controller
{
    public function index() {
        $total_book = Book::count();
        return view('admin.menu', compact('total_book'));
    }
}
