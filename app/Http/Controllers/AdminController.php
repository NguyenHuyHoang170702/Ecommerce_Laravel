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

    public  function view_product()
    {
        $category = Category::all();
        return view('admin.product.product', compact('category'));
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

    public function show_product()
    {
        $data = Product::all();
        return view('admin.product.showProduct', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id)->delete();
        return redirect()->back()->with('message','Product deleted successfully');
    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.product.editProduct', compact('data','category'));
    }

    public function updateProductConfirm(Request $request, $id)
    {
        $data = Product::find($id);
        if($data != null){
            $data->title = $request->title;
            $data->description = $request->description;
            $data->category = $request->category;
            $data->quantity = $request->quantity;
            $data->price = $request->price;
            $data->discount_price = $request->discount_price;
            $image = $request->image;
            if($image != null){
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imageName);
                $data->image = $imageName;
            }
            $data->save();
            return redirect()->back()->with('message','Product updated successfully');
        }
        return redirect()->back()->with('message','Product updated failed');
    }
}
