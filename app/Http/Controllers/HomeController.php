<?php

namespace App\Http\Controllers;

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
        if ($userType->email_verified_at != null){
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
        return view('home.detail', compact('data'));
    }

}
