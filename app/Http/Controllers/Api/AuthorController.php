<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\ResponseHelper;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
<<<<<<< HEAD
=======
    /**
     * Display a listing of the resource.
     */
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
    public function index()
    {
        $authors = Author::all();
        return ResponseHelper::success('جميع المؤلفين', $authors);
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:70|unique:authors'
        ]);
        $author = Author::create($request->all());
        return ResponseHelper::success('تمت إضافة المؤلف', $author);
    }

    public function show(Author $author)
    {
        return ResponseHelper::success('بيانات المؤلف', $author);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:70|unique:authors,name,' . $author->id
        ]);
        $author->update($request->all());
        return ResponseHelper::success('تمت تحديث المؤلف', $author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return ResponseHelper::success('تمت حذف المؤلف', $author);
    }
}

=======
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:70'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->save();

        return ResponseHelper::success("تمت إضافة المؤلف", $author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => "required|max:70"
        ]);

        $author->name = $request->name;
        $author->save();

        return ResponseHelper::success("تم تعديل المؤلف", $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
     
        $author->delete();

        return ResponseHelper::success("تم حذف المؤلف", $author);
    }
}
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
