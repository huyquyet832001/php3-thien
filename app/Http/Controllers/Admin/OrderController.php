<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $pagesize = 5;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $bill = Bill::orderBy('created_at', 'desc')->paginate($pagesize);
        } else {
            $billQuery = Bill::where('phone', 'like', "%" . $request->keyword . "%");
            $bill = $billQuery->paginate($pagesize)->appends($searchData);
        }
        return view('admin.order.index', ['bill' => $bill, 'searchData' => $searchData]);
    }
    public function delete($id)
    {
        $model = Bill::find($id);
        $model->delete();
        return redirect()->back();
    }
    public function BillDetail($id)
    {
        $bill = Bill::find($id);
        $bill->load('bill_detail');
        return view('admin.order.bill_detail', ['bill' => $bill]);
    }
}
