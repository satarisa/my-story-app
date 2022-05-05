<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'cover', 'author'];

    public function book_detail() {
        return $this->hasOne(BookDetail::class, 'book_id', 'id');
    }
}
