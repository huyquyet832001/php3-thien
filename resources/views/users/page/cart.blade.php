@extends('users/layout')
@section('content-right')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::has('cart'))
                        @foreach ($product_cart as $product)
                            <tr>
                                <td>
                                    <h5>{{ $product['item']['name'] }}</h5>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $product['item']['image']) }}" width="150px"
                                        height="150px" alt="">
                                </td>
                                <td>
                                    @if ($product['item']['promotion_price'] == 0)
                                        {{ number_format($product['item']['price']) }}đ
                                    @else
                                        {{ number_format($product['item']['promotion_price']) }}đ
                                    @endif
                                </td>

                                <td>
                                    {{ $product['qty'] }}
                                </td>
                                <td class="shoping__cart__total">
                                    {{ number_format($product['price']) }}đ
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ url('/deleteCart/' . $product['item']['id']) }}"
                                        class="btn btn-secondary">Xóa<span class="icon_close"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row mr-5">
            <div class="d-flex justify-content-end">
                <div class="table-secondary p-4">
                    @if (Session::has('cart') != null)
                        <h4>Tổng Tiền: <span>{{ number_format(Session('cart')->totalPrice) }}đ</span></h4>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('users.page.index') }}" class="btn btn-success mr-5">Quay Lại Mua Hàng</a>
                            <a href="{{ route('users.page.order') }}" class="btn btn-success">Đặt Hàng</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
