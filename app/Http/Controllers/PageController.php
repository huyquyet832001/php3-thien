<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
use App\Models\NewModel;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $products = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $products =  Product::where('name', 'LIKE', "%$keyword%")->paginate(10);
        } else {
            $products = Product::paginate(10);
        }
        $product_sale = Product::where('promotion_price', '<>', 0)->orderBy('id', 'desc')->limit(10)->get();
        $cates = Category::get();
        $news = NewModel::orderBy('id', 'desc')->limit(4)->get();
        return view('users.page.index', ['products' => $products, 'cates' => $cates, 'news' => $news, 'product_sale' => $product_sale]);
    }
    public function detail($id)
    {
        $product_detail = Product::find($id);
        $product_detail->load('galleries');
        $cates = Category::get();
        return view('users.page.detail', ['cates' => $cates, 'product_detail' => $product_detail]);
    }
    public function Category($id)
    {
        $category = Category::where('id', $id)->first();
        $product_category = Product::where('cate_id', $category->id)->paginate(10);
        $cates = Category::get();
        return view('users.page.category', ['product_category' => $product_category, 'cates' => $cates]);
    }
    public function getCart()
    {
        $cates = Category::get();
        return view('users.page.cart', ['cates' => $cates]);
    }
    public function getAddCart(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product->quantity > 0) {
            $oldCart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $id);
            foreach ($cart->items as $key => $value) {
                $product->quantity = $product->quantity - $value['qty'];
                $product->save();
            }
            $request->session()->put('cart', $cart);
            return redirect(route('users.page.cart'));
        }
        return redirect()->back()->with('thongbaocart', 'Hiện Tại Sản Phẩm Đã Hết Hàng');
    }
    public function deleteCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function Order()
    {
        return view('users.page.order');
    }
    public function AddOrder(Request $request)
    {
        $request->validate(
            [
                'address' => 'required',
                'phone' => 'required'
            ],
            [
                'address.required' => 'Hãy Nhập Địa Chỉ Để Giao Hàng',
                'phone.required' => 'Hãy nhập Số Điện Thoại'
            ]
        );
        $cart = Session::get('cart');
        $bill = new Bill();
        $bill->id_User = Auth::user()->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->flexRadioDefault;
        $bill->note = $request->note;
        $bill->address = $request->address;
        $bill->phone = $request->phone;
        $bill->fill($request->all());
        $bill->save();
        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail();
            $bill_detail['id_bill'] = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Mail::to(Auth::user()->email, $bill, $bill_detail, $cart)
            ->send(new SendMail($bill, $bill_detail, $cart));
        Session::forget('cart');
        return redirect(route('users.page.index'))->with('thongbaodathang', 'Bạn Đã Đặt Hàng Thành Công');
    }
}
