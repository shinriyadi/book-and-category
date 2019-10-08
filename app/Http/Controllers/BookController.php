<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
        $categories = Category::get();
        return view('index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('book.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payloads = $request->all();
        $book = Book::create($payloads);

        $category = Category::find($request->categories);

        foreach ($request->categories as $val) {
            $book->categories()->attach($val);
        }

        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::get();

        return view('book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payloads = $request->all();
        $book = Book::find($id);
        $book->update($payloads);

        $category = Category::find($request->categories);

        $book->categories()->detach();
        foreach ($request->categories as $val) {
            $book->categories()->attach($val);
        }

        return redirect(route('book.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->categories()->detach();

        $book->delete();

        return redirect(route('book.index'));
    }

    public function deleteSelected(Request $request)
    {
        // Book::destroy($request->all());
        $payloads = $request->all();
        foreach($payloads as $i) {
            Book::destroy($i);
        }
        return response()->json(
            [
                'Message' => 'Susccess',
            ]
        );
    }
}
