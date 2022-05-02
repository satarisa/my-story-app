<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;

    protected $table = 'book_details';
    protected $primaryKey = 'id';
    protected $fillable = ['book_id', 'type', 'genre', 'country', 'link', 'description'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
