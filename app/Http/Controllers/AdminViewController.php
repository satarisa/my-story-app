<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AdminViewController extends Controller
{
    public function index() {
        $total_book = Book::count();
        $total_user = User::count();
        $total_review = Review::count();
        $created_date = Session::get('user')->created_at;
        $joined_days = $created_date->diffInDays();
        $dashboard_values = [
            'total_book' => $total_book,
            'total_user' => $total_user,
            'total_review' => $total_review,
            'joined_days' => $joined_days
        ];

        $latest = BookDetail::latest()->first();

        return view('admin.menu', compact('dashboard_values', 'latest'));
    }
}
