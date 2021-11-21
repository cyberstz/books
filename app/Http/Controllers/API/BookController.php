<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        foreach ($books as $book) {
            $book->author = $book->author;
        }

        return $books;
    }

    public function show(Book $book)
    {
        $book->author = $book->author;

        return $book;
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'author' => 'required'
        ]);

        $author = Author::firstOrCreate([
            'name' => $request->author
        ]);

        Book::updateOrCreate(
            ['name' => $request->name],
            ['author_id' => $author->id]
        );

        return true;
    }
}