<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::all();
       return ResponseHelper::success(' جميع الأصناف',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = "$request->id." . $file->extension();
            Storage::putFileAs('category-images', $file, $filename);
            $category->image = $filename;
        }

        $category->save();
        return ResponseHelper::success("تمت إضافة الصنف" , $category);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required|max:50|unique:categories,name,$id"
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return ResponseHelper::success("تم تعديل الصنف" , $category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        
        // Check if category has associated books
        if ($category->books()->count() > 0) {
            return ResponseHelper::error("لا يمكن حذف الصنف لوجود كتب مرتبطة به" . $category->books()->count() , null, 409);
        
        }
        
        $category->delete();
        return ResponseHelper::success("تم حذف الصنف" , $category);
    }
}
