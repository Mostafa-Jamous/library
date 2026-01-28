<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\ResponseHelper;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\App;
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        $categories =  Category::all();
       return ResponseHelper::success(' جميع الأصناف',$categories);
=======
        // $categories =  Category::all();
        // $categories =  Category::withAvg('books' , 'price')->get();
        $categories =  Category::withCount('books')->get();

        //    return ResponseHelper::success(trans('library.all-categories'),$categories);
        return ResponseHelper::success(__('library.all-categories'), $categories);
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories',
<<<<<<< HEAD
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
=======
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048'
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
        ]);
        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
<<<<<<< HEAD
            $filename = "$request->id." . $file->extension();
            Storage::putFileAs('category-images', $file, $filename);
=======
            $filename = time() . '_' . $file->getClientOriginalName();
            Storage::putFileAs('category-images', $file, $filename);
            // حفظ اسم الملف في قاعدة البيانات
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
            $category->image = $filename;
        }

        $category->save();

        return ResponseHelper::success("تمت إضافة الصنف", $category);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required|max:50|unique:categories,name,$id",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = Category::findorfail($id);
        $category->name = $request->name;
<<<<<<< HEAD

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = "$request->id." . $file->extension();
            Storage::putFileAs('category-images', $file, $filename);
            $category->image = $filename;
        }

        $category->save();
        return ResponseHelper::success("تم تعديل الصنف" , $category);
=======
>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            Storage::putFileAs('category-images', $file, $filename);
            if ($category->image)                
                Storage::delete("category-images/$category->image");
            // حفظ اسم الملف في قاعدة البيانات
            $category->image = $filename;
        }
        $category->save();
        return ResponseHelper::success("تم تعديل الصنف", $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
<<<<<<< HEAD
    {
        $category = Category::find($id);
        
        // Check if category has associated books
        if ($category->books()->count() > 0) {
            return ResponseHelper::error("لا يمكن حذف الصنف لوجود كتب مرتبطة به" . $category->books()->count() , null);
        
        }
        
=======
    {        
        $category = Category::findorfail($id);
        
        // التحقق من وجود كتب مرتبطة بالصنف
        $booksCount = $category->books()->count();
        if ($booksCount > 0) {
            return ResponseHelper::failed("لا يمكن حذف الصنف لوجود $booksCount كتاب مرتبط به");
        }

        if ($category->image)                
                Storage::delete("category-images/$category->image");


>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6
        $category->delete();
        return ResponseHelper::success("تم حذف الصنف");
    }
}
