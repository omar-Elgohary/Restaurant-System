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

    public function show()
    {

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

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('message', 'تم حذف الصنف بنجاح');
    }
}
