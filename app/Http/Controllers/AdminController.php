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
        return view('admin.category.category', compact('data'));
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


}
