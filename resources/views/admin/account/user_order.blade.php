@extends("admin.layout.index")
@section('title')
    Khách Hàng Đã Mua
@endsection
@section('contents')
    <div>
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row g-0">
                            <div class="col-4">
                                <label class="col-3">Họ Tên:</label>
                                <label class="col-8">{{ $user->name }}</label>
                            </div>
                            <div class="col-5">
                                <label class="col-2">Email:</label>
                                <label class="col-8">{{ $user->email }}</label>
                            </div>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="ml-4">Lịch sử mua hàng</h3>
                        <table class="table table-striped" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Tên Khách Hàng</td>
                                    <td>Tổng Tiền</td>
                                    <td>Địa Chỉ Gửi Hàng</td>
                                    <td>Hình Thức Thanh Toán</td>
                                    <td>Số Điện Thoại</td>
                                    <td>Ghi Chú</td>
                                    <td>Created At</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->bill as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->payment }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
