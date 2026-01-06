<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\ResponseHelper;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return ResponseHelper::success('جميع المؤلفين', $authors);
    }

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
