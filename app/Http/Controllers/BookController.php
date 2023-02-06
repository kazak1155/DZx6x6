<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:books','max:255'],
            'author' => ['required','max:100'],
            'genre' => ['required']
        ]);

        Book::create($validatedData);

        return response()->json('Book is successfully validated and data has been saved');
    }
}
