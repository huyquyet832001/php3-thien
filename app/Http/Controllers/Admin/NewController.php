<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\NewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{
    public function index(Request $request)
    {
        $pagesize = 5;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $news = NewModel::paginate($pagesize);
        } else {
            $newQuery = NewModel::where('title', 'like', "%" . $request->keyword . "%");
            $news = $newQuery->paginate($pagesize)->appends($searchData);
        }
        return view('admin.news.index', ['news' => $news, 'searchData' => $searchData]);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function createAdd(NewRequest $request)
    {
        $model = new NewModel();
        $model->fill($request->all());
        if ($request->hasFile('uploadfile')) {
            $model->image = $request->file('uploadfile')->storeAs('uploads/news', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->save();
        return redirect(route('new.index'));
    }
    public function edit($id)
    {
        $model = NewModel::find($id);
        if (!$model) {
            return redirect()->back();
        }
        return view('admin.news.edit', ['model' => $model]);
    }
    public function editAdd($id, NewRequest $request)
    {
        $model = NewModel::find($id);
        if (!$model) {
            return redirect()->back();
        }
        $model->fill($request->all());
        if ($request->hasFile('uploadfile')) {
            $model->image = $request->file('uploadfile')->storeAs('uploads/news', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->save();
        return redirect(route('new.index'));
    }
    public function delete($id)
    {
        NewModel::destroy($id);
        return redirect()->back();
    }
}
