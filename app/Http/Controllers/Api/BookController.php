<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        $books = Book::with(['category', 'authors'])->get();
        return ResponseHelper::success(' جميع الكتب', $books);
=======

        // $book = Book::all();

        /** using map to return custom fields */
        // $books = Book::select("ISBN" ,"title" ,  "price" ,"mortgage" ,"cover")
        // ->get()
        // ->map(function($book){
        //     return [
        //         "ISBN" => $book->ISBN ,
        //         "title" => $book->title ,
        //         "price" => $book->price ,
        //         "mortgage" => $book->mortgage ,
        //         "cover" =>  asset('storage/book-images/' . ($book->cover ?? 'no-image.jpeg')) ,
        //     ];
        // });
        // return ResponseHelper::success(' جميع الكتب', $books);

        // if ($title){}, we use when() method instead of if condition

        // $title = $request->has('title');        
        $title = $request->title;
        $books = Book::select("id", "ISBN", "title",  "price", "mortgage", "cover", "category_id")
            ->when($title, function ($q) use ($title) {
                return $q->where('title', 'like', "%$title%");
            })
            ->with(['authors', 'category'])
            ->orderBy('id')
            ->get();

        /** Using resource */
        return ResponseHelper::success(' جميع الكتب', BookResource::collection($books));
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
<<<<<<< HEAD
        $book = Book::create($request->except('authors'));

        if ($request->hasFile('cover')){
=======
        //  return $request->all();
        $validated = $request->validated();
        
        if ($request->hasFile('cover')) {
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
            $file = $request->file('cover');
            $filename = "$request->ISBN." . $file->extension();
            Storage::putFileAs('book-images', $file, $filename);
            $validated['cover'] = $filename;
        }
<<<<<<< HEAD
        
        // Attach authors if provided
        if ($request->has('authors') && is_array($request->authors)) {
            $book->authors()->attach($request->authors);
        }
        
        $book->load(['category', 'authors']);
=======
        $book = Book::create($validated);

        // ربط المؤلفين بالكتاب
        $book->authors()->attach($validated['authors'] ?? []);
        
        // تحميل العلاقات لإرجاعها في الاستجابة
        $book->load(['category', 'authors']);

>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
        return ResponseHelper::success("تمت إضافة الكتاب", $book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
<<<<<<< HEAD
        $book->load(['category', 'authors']);
        return ResponseHelper::success('تفاصيل الكتاب', $book);
=======
        $book = $book->load(['authors', 'category']);

        return ResponseHelper::success("تم إعادة الكتاب بنجاح", new BookResource($book));
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
<<<<<<< HEAD
        $book->update($request->except('authors'));
        
        if ($request->hasFile('cover')){
            // Delete old cover if exists
            if ($book->cover && Storage::exists('book-images/' . $book->cover)) {
                Storage::delete('book-images/' . $book->cover);
            }
            
            $file = $request->file('cover');
            $filename = "$request->ISBN." . $file->extension();
            Storage::putFileAs('book-images', $file ,$filename );
            $book->cover = $filename;
            $book->save();
        }
        
        // Sync authors if provided
        if ($request->has('authors') && is_array($request->authors)) {
            $book->authors()->sync($request->authors);
        }
        
        $book->load(['category', 'authors']);
=======
        $validated = $request->validated();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = "$request->ISBN." . $file->extension();
            if ($book->cover) {
                // return "book-images/$book->cover";
                Storage::delete("book-images/$book->cover");
            }

            Storage::putFileAs('book-images', $file, $filename);
            $validated['cover'] = $filename;
        }
        $book->update($validated);


        $book->authors()->sync($validated['authors'] ?? []);
        
        $book->load(['category', 'authors']);

>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
        return ResponseHelper::success("تمت تعديل الكتاب", $book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
<<<<<<< HEAD
        // Delete book image if exists
        if ($book->cover && Storage::exists('book-images/' . $book->cover)) {
            Storage::delete('book-images/' . $book->cover);
        }
        
=======
        if ($book->cover) {
            Storage::delete("book-images/$book->cover");
        }
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
        $book->delete();
        return ResponseHelper::success("تم حذف الكتاب");
    }
}

