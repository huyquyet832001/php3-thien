<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    public function index(Request $request)
    {
        // if (Gate::allows('create-user') == false) {
        //     abort(403);
        // }
        $pagesize = 10;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $users = User::paginate($pagesize);
        } else {
            $userQuery = User::where('name', 'like', "%" . $request->keyword . "%");
            $users = $userQuery->paginate($pagesize)->appends($searchData);
        }
        return view('admin.account.index', ['users' => $users, 'searchData' => $searchData]);
    }
    public function edit($id)
    {
        $model = User::find($id);
        if (!$model) {
            return redirect()->back();
        }
        return view('admin.account.edit', compact('model'));
    }
    public function editAdd($id, Request $request)
    {
        $users = User::find($id);
        $users->fill($request->all());
        if (!$users) {
            return redirect()->back();
        }
        $users->save();
        return redirect(route('account.index'));
    }
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    public function UserOrder($id)
    {
        $user = User::find($id);
        $user->load(['bill']);
        return view('admin.account.user_order', ['user' => $user]);
    }
}
