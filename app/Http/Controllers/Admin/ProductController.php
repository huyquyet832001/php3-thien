<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pagesize = 10;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $products = Product::paginate($pagesize);
        } else {
            $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");
            if ($request->has('cate_id') && $request->cate_id != "") {
                $productQuery = $productQuery->where('cate_id', $request->cate_id);
            }
            if ($request->has('order_by') && $request->order_by > 0) {
                if ($request->order_by == 1) {
                    $productQuery = $productQuery->orderBy('name');
                } else if ($request->order_by == 2) {
                    $productQuery = $productQuery->orderByDesc('name');
                } else if ($request->order_by == 3) {
                    $productQuery = $productQuery->orderBy('price');
                } else {
                    $productQuery = $productQuery->orderByDesc('price');
                }
            }

            $products = $productQuery->paginate($pagesize)->appends($searchData);
        }
        $products->load('category');
        $cates = Category::all();
        //trả về cho người dùng giao diện và dữ liệu vừa lấy ra
        return view('admin.products.index', [
            'data_product' => $products,
            'cates' => $cates,
            'searchData' => $searchData
        ]);
    }
    public function create()
    {
        $cates = Category::all();
        return view('admin.products.create', compact('cates'));
    }
    public function createAdd(ProductRequest $request)
    {
        $model = new Product();
        $model->fill($request->all());
        if ($request->hasFile('uploadfile')) {
            $model->image = $request->file('uploadfile')->storeAs('uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->save();
        if ($request->has('galleries')) {
            foreach ($request->galleries as $i => $item) {
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $galleryObj->order_no = $i + 1;
                $galleryObj->url = $item->storeAs(
                    'uploads/products/galleries/' . $model->id,
                    uniqid() . '-' . $item->getClientOriginalName()
                );
                $galleryObj->save();
            }
        }
        return redirect(route('product.index'));
    }
    public function edit($id)
    {
        $model = Product::find($id);
        if (!$model) {
            return redirect()->back();
        }
        $cates = Category::all();
        $model->load('galleries');
        return view('admin.products.edit', compact('model', 'cates'));
    }
    public function editAdd($id, Request $request)
    {
        $model = Product::find($id);
        if (!$model) {
            return redirect()->back();
        }
        $model->fill($request->all());
        if ($request->hasFile('uploadfile')) {
            $model->image = $request->file('uploadfile')->storeAs('uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->save();
        if ($request->has('removeGalleryIds')) {
            $strIds = rtrim($request->removeGalleryIds, '|');
            $lstIds = explode('|', $strIds);
            // xóa các ảnh vật lý
            $removeList = ProductGallery::whereIn('id', $lstIds)->get();
            foreach ($removeList as $gl) {
                Storage::delete($gl->url);
            }

            ProductGallery::destroy($lstIds);
        }
        if ($request->has('galleries')) {
            foreach ($request->galleries as $i => $item) {
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $galleryObj->order_no = $i + 1;
                $galleryObj->url = $item->storeAs(
                    'uploads/products/galleries/' . $model->id,
                    uniqid() . '-' . $item->getClientOriginalName()
                );
                $galleryObj->save();
            }
        }
        return redirect(route('product.index'));
    }
    public function delete($id)
    {
        $products = Product::find($id);
        $destinationPath = 'storage/' . $products->image;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        Product::destroy($id);
        return redirect()->back();
    }
}
