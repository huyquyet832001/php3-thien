@extends('users/layout')
@section('content-right')
    @php
    use Illuminate\Support\Facades\Auth;
    @endphp
    <form method="POST" class="mt-4" enctype="multipart/form-data" action="{{ url('/AddOrder/') }}">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <h2 class="list-group-item list-group-item-action" style="background: green;color:#fff;border-radius:3px"
                    aria-current="true">
                    Thông tin khách hàng</h2>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Họ Và Tên</label>
                        <input type="text" class="form-control" placeholder="Name" name="name"
                            value=" {{ Auth::user()->name }}" readonly>
                    </div>
                    <input type="hidden" class="form-control" placeholder="Name" name="password"
                        value=" {{ Auth::user()->password }}">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" readonly
                            value=" {{ Auth::user()->email }}" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ghi Chú</label>
                        <textarea name="note" id="" cols="30" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <h2 class="list-group-item list-group-item-action" style="background: green;color:#fff;border-radius:3px"
                    aria-current="true">
                    Đơn hàng của bạn</h2>
                @if (Session::has('cart'))
                    @foreach ($product_cart as $product)
                        <div class="row g-0" style="border:1px solid#e7e7e7;margin-top:-8px">
                            <div class="col-md-4 pt-3 pb-3">
                                <img src="{{ asset('storage/' . $product['item']['image']) }}" width="150px"
                                    height="150px" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product['item']['name'] }}</h5>
                                    <p class="card-text">Số Lượng: {{ $product['qty'] }}</p>
                                    <p class="card-text">Giá: {{ number_format($product['price']) }}đ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (Session::has('cart') != null)
                    <div class="d-flex justify-content-between mt-4">
                        <h4>Tổng Tiền:</h4>
                        <h4>
                            @if (Session::has('cart'))
                                {{ number_format(Session('cart')->totalPrice) }}@else 0 @endif đ
                        </h4>
                    </div>
                @endif
                <h2 class="list-group-item list-group-item-action" style="background: green;color:#fff;border-radius:3px"
                    aria-current="true">
                    Hình thức thanh toán</h2>
                <div style="border: 1px solid #e7e7e7;margin-top:-8px" class="p-3">
                    <div class="ml-2">
                        <input type="radio" value="Nhận Hàng Mới Thanh Toán" class="form-check-input me-1" checked
                            name="flexRadioDefault" id="flexRadioDefault1"><span style="font-weight:bold"> Thanh
                            Toán Khi Nhận
                            Hàng</span>
                        <p class="pl-3 pt-2" style="border: 1px solid #e7e7e7;background:#E0E0E0;border-radius:4px">Cửa Hàng
                            Sẽ
                            Gửi Hàng Đến Địa
                            Chỉ Của Bạn, Bạn Xem
                            Hàng Rồi Thanh Toán Tiền Cho Nhân
                            Viên
                            Giao Hàng</p>
                    </div>
                    <div class="ml-2">
                        <input type="radio" value="Thanh Toán Qua ATM" class="form-check-input me-1" name="flexRadioDefault"
                            id="flexRadioDefault2"> <span style="font-weight:bold"> Chuyển Tiền
                            Đến Tài Khoản
                            Sau:</span>
                        <p class="p-3" style="border: 1px solid #e7e7e7;background:#E0E0E0;border-radius:4px">
                            Số Tài Khoản: 2817871838
                            <br>Chủ Tài Khoản: Nguyễn Huy Quyết
                            <br>Ngân Hàng ABC, Chi Nhánh Hà Nội
                        </p>
                    </div>
                    <div class=" mt-3 d-flex justify-content-center">
                        <button class="btn btn-success"> Đặt Hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
