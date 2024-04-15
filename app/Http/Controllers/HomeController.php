<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function redirect()
    {
        $userType = Auth::user()->usertype;
        $userCheck = Auth::user()->email_verified_at;
        if ($userCheck != null){
            if($userType == '1'){
                return view('admin.home');
            }else{
                $data = Product::all();
                return view('home.user',compact('data'));
            }
        }
    }

    public function index() {
        $data = Product::all();
        return view('home.user', compact('data'));
    }

    public function detail($id) {
        $data = Product::find($id);
        $categories = Category::all();
        return view('home.detail', compact('data','categories'));
    }

    public function show_Man_product()
    {
        $categoryForMen = Category::where('category_name', 'Đàn ông')->first();

        if (!$categoryForMen) {
            return redirect()->back()->with('error', 'Không tìm thấy loại sản phẩm "Đàn ông".');
        }
        $productsForMen = Product::where('category', $categoryForMen->id)->get();
        $categories = Category::all();

        return view('home.product_men_area', compact('productsForMen', 'categories'));
    }

    public function show_WoMan_product()
    {
        $categoryForMen = Category::where('category_name', 'Phụ nữ')->first();

        if (!$categoryForMen) {
            return redirect()->back()->with('error', 'Không tìm thấy loại sản phẩm "Đàn ông".');
        }
        $productsForMen = Product::where('category', $categoryForMen->id)->get();
        $categories = Category::all();

        return view('home.product_women_area', compact('productsForMen', 'categories'));
    }

    public function show_Kid_product()
    {
        $categoryForMen = Category::where('category_name', 'Trẻ nhỏ')->first();

        if (!$categoryForMen) {
            return redirect()->back()->with('error', 'Không tìm thấy loại sản phẩm "Đàn ông".');
        }
        $productsForMen = Product::where('category', $categoryForMen->id)->get();
        $categories = Category::all();

        return view('home.product_kid_area', compact('productsForMen', 'categories'));
    }


}
