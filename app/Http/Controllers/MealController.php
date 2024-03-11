<?php
namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(3);
        return view('meals.meals', get_defined_vars());
    }

    public function create()
    {
        $categories = Category::all();
        return view('meals.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:3|max:20|unique:meals',
            'description' => 'required|string|min:3|max:255',
            'price'       => 'required|numeric',
            'image'       => 'required|image|mimes:jpg,jpeg,png,gif|max:5048',
            'category'    => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/Meals/', $imageName);

        // intervention image => اسم المكتبة الخاصة بالتعامل مع الصور
        // $image = $request->file('image');    $image = pizza.jpg
        // $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();    // $imageName = 65465454.jpg
        // Image::make($image)->resize(300, 300)->save('upload/Meals/' . $imageName);
        // $path = 'upload/Meals/' . $imageName;
        // 'image'       => $path,

        Meal::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $imageName,
            'category'    => $request->category,
        ]);
        $notification = array(
            'message_id' => 'تم إضافة الوجبة بنجاح',
            'alert-type' => 'success',
        );
        return redirect()->route('meal.index')->with($notification);
    }

    public function edit($id)
    {
        $meal = Meal::find($id);
        $categories = Category::all();
        return view('meals.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images/Meals/', $imageName);
            $meal->image = $imageName;
        }

        $meal->name = $request->name;
        $meal->description = $request->description;
        $meal->price = $request->price;
        $meal->category = $request->category;
        $meal->save();

        $notification = array(
            'message_id' => 'تم تعديل الوجبة بنجاح',
            'alert-type' => 'info',
        );
        return redirect()->route('meal.index')->with($notification);
    }
}
