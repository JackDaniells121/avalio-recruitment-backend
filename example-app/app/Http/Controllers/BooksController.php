<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookDeleteRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function list()
    {
        return view('books.list', [
            'books' => Book::all(),
        ]);
    }

    public function search(Request $request)
    {
        return view('books.search', [
            'books' => Book::where('name', 'like', '%' . $request->input('name') . '%')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->publication_date = $request->input('publication_date');
        $book->count = $request->input('count');
        $book->save();
        return response()->json([
            'message' => "Book added."
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!empty($book)) {
            return response()->json($book);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view('books.edit', [
            'book' => Book::find($request->get('id')),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request)
    {
        $book = Book::find($request->validated('id'));
        if ($book) {
            $book->name = $request->validated('name');
            $book->author = $request->validated('author');
            $book->description = $request->validated('description');
            $book->publication_date = $request->validated('publication_date');
            $book->save();

            return response()->json([
                "message" => "Book updated"
            ], 201);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDeleteRequest $request)
    {
        $book = Book::find($request->validated('id'));

        if ($book) {
            $book->delete();

            return response()->json([
                "message" => "Book deleted"
            ], 201);

        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }
}
