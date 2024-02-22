<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->name;
        $data->save();
        return redirect()->back()->with('message','category added successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id)->delete();
        return redirect()->back()->with('message','category deleted successfully');
    }

    public  function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

   public function add_product(Request $request)
    {
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;

        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imageName);
        $data->image = $imageName;
        $data->save();
        return redirect()->back()->with('message','Product added successfully');
    }
}
