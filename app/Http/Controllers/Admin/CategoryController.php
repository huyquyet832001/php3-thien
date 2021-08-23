<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $pagesize = 10;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $categories = Category::paginate($pagesize);
        } else {
            $categoryQuery = Category::where('name', 'like', "%" . $request->keyword . "%");
            $categories = $categoryQuery->paginate($pagesize)->appends($searchData);
        }
        return view('admin.category.index', ['categories' => $categories, 'searchData' => $searchData]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function createAdd(CategoryRequest $request)
    {

        $model = new Category();
        $model->fill($request->all());
        $model->save();
        return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $model = Category::find($id);
        if (!$model) {
            return redirect()->back();
        }
        return view('admin.category.edit', ['model' => $model]);
    }
    public function editAdd($id, CategoryRequest $request)
    {
        $Category = Category::find($id);
        $Category->fill($request->all());
        if (!$Category) {
            return redirect()->back();
        }
        $Category->save();
        return redirect(route('category.index'));
    }
    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->back();
    }
    public function detail($id)
    {
        $cate = Category::find($id);
        $cate->load('products');
        return view('admin.category.detail', ['cate' => $cate]);
    }
}
