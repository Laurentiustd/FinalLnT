<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        $category = Category::all();
        return view('welcome', compact('book','category'));
    }


    public function showDashboard(){
        $book = Book::all();
        $category = Category::all();
        return view('dashboard', compact('book','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('createBook', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|integer',
            'Quantity' => 'required|integer',
            'Image' => 'required'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/article/images', $filename);

        Book::create([
            'Name' => $request -> Name,
            'Price' => $request -> Price,
            'Quantity' => $request -> Quantity,
            'Image' => $filename,
            'category_id' => $request -> CategoryName
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $category = Category::all();
        return view('editBook', compact('book', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|integer',
            'Quantity' => 'required|integer',
            'Image' => 'required'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/article/images', $filename);

        Book::findOrFail($id)->update([
            'Name' => $request -> Name,
            'Name' => $request -> Name,
            'Price' => $request -> Price,
            'Quantity' => $request -> Quantity,
            'Image' => $filename,
            'category_id' => $request -> CategoryName
        ]);

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect('/');
    }
}
