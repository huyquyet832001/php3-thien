    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
    <div class="row">
        <div class="col-xl-6">
            <div class="list-group-item list-group-item-action" style="background: green;color:#fff;border-radius:3px"
                aria-current="true">
                <h2 style="text-align: center"> THÔNG TIN ĐƠN ĐẶT HÀNG</h2>
            </div>
            <h4>Họ Và Tên: {{ Auth::user()->name }}</h4>
            <h4>Email: {{ Auth::user()->email }}</h4>
            <h4>Địa Chỉ: {{ $bill->address }}</h4>
            <h4>Số Điện Thoại: {{ $bill->phone }}</h4>
            <table class="table" style="border: 1px solid green; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th
                            style="border: 1px solid green;text-align:center; border-collapse: collapse;padding:10px 0px">
                            Tên Sản Phẩm
                        </th>
                        <th
                            style="border: 1px solid green;text-align:center; border-collapse: collapse;padding:10px 30px">
                            Số Lượng</th>
                        <th
                            style="border: 1px solid green;text-align:center; border-collapse: collapse;padding:10px 30px">
                            Giá Của Một
                            Sản Phẩm</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cart->items as $key => $value)
                        <tr>
                            <td
                                style="border: 1px solid green;text-align:center; border-collapse: collapse;padding:0px 30px">
                                <h4> {{ $bill_detail->product->name }}</h4>
                            </td>
                            <td style="border: 1px solid green;text-align:center; border-collapse: collapse;">
                                <h4> {{ $bill_detail->quantity = $value['qty'] }}</h4>
                            </td>
                            <td style="border: 1px solid green;text-align:center; border-collapse: collapse;">

                                <h4> {{ $bill_detail->unit_price = $value['price'] / $value['qty'] }}</h4>
                            </td>

                    @endforeach
                    </tr>
                </tbody>
            </table>

            <h4 style="color: red">Tổng Tiền: {{ number_format($bill->total) }}</h4>
            <h4>Thời Gian Đặt Hàng: {{ $bill->created_at }}</h4>
            <h4>Ghi Chú: {{ $bill->note }}</h4>
            <h4> Hình thức thanh toán: {{ $bill->payment }}</h4>
            <h3 style="text-align: center">Cảm Ơn Bạn Đã Tin Tưởng Và Ghé Qua Website Di Động Xanh Để Mua Hàng!</h3>
        </div>
    </div>
