<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //lấy danh mục trong db
        // $cates = Category::all();
        //sinh ra view và truyền dữ liệu ra ngoài view
        return view('layout-admin.main');
    }
    public function removeCate($cateId)
    {
        $cate = Category::find($cateId);
        if (!$cate) {
            return "Đường dẫn không tồn tại";
        }
        $cate->delete();
        return redirect(route('homepage'));
    }
}
