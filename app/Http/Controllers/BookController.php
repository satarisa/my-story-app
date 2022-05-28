<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_details = BookDetail::all();
        return view('admin.book.index', compact('book_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'cover' => ['required', 'image'],
            'author' => ['required'],
            'type' => ['required'],
            'link' => ['url', 'nullable']
        ], [
            'required' => "This field can't be empty!",
            'url' => "URL not valid!",
        ]);

        $book = new Book;
        $book->title = $request->title;
        $cover = $request->file('cover');
        if(!empty($cover)){
            $cover_name = date('Y-m-d')."_".$request->id.'_'.$cover->getClientOriginalName();
            $cover->move("assets/cover",$cover_name);
            $book->cover = $cover_name;
        }
        $book->author = $request->author;

        $book->save();

        $book_detail = new BookDetail;
        $book_detail->book_id = $book->id;
        $book_detail->type = $request->type;
        $book_detail->genre = $request->genre;
        $book_detail->country = $request->country;
        $book_detail->link = $request->link;
        $book_detail->description = $request->description;
        
        Session::flash('add', $book_detail->save());
        return redirect('/book')->with('status', 'A Book Story has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book_detail = BookDetail::where('book_id', $book->id)->first();
        $reviews = Review::where('book_id', $book->id)->get();
        $rate_avg = Review::where('book_id', $book->id)->avg('rating');
        return view('admin.book.show', compact('book_detail', 'reviews', 'rate_avg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book_detail = BookDetail::where('book_id', $book->id)->first();
        return view('admin.book.edit', compact('book_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'cover' => ['image'],
            'author' => ['required'],
            'type' => ['required'],
            'link' => ['url', 'nullable']
        ], [
            'required' => "This field can't be empty!",
            'url' => "URL not valid!",
            'image' => "File type must be an image! (jpg, jpeg, png, bmp, gif, svg, or webp)"
        ]);

        $book = Book::find($id);
        $book_detail = BookDetail::find($book->id);

        $book->title = $request->title;
        if ($request->cover != null) {
            $cover = $request->file('cover');
            if(!empty($cover)){
                $cover_name = date('Y-m-d')."_".$request->id.'_'.$cover->getClientOriginalName();
                $cover->move("assets/cover",$cover_name);
                $book->cover = $cover_name;
            }
        }
        $book->author = $request->author;
        $book_detail->type = $request->type;
        $book_detail->genre = $request->genre;
        $book_detail->country = $request->country;
        $book_detail->link = $request->link;
        $book_detail->description = $request->description;

        Session::flash('edit', [$book->save(), $book_detail->save()]);
        return redirect()->route('book.show', $id)->with('status', 'Data has been successfully changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('book.index')->with('status','Story has been deleted!');
    }
}
