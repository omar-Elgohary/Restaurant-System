<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.categoryPage', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:20|unique:categories',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return back()->with('message', 'تم إضافة صنف جديد');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:20|unique:categories',
        ]);
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return back()->with('message', 'تم تعديل الصنف بنجاح');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('message', 'تم حذف الصنف بنجاح');
    }
}
