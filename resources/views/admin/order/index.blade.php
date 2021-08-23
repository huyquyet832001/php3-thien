@extends('admin.layout.index')
@section('title')
    Quản Trị Đơn Hàng
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tìm Số Điện Thoại</label>
                                <input type="text" name="keyword" @isset($searchData['keyword'])
                                    value="{{ $searchData['keyword'] }}" @endisset>
                            </div>
                            <div class="col-3 mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                                    </div>
                                    {{-- <div class="col-6">
                                        <a href="{{ route('account.create') }}" class="btn btn-success">
                                            Create
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if (!empty($bill))
                    <table class="table table-striped text-center" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Hình Thức Thanh Toán</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Ghi Chú</th>
                                <th scope="col">Thời Gian Đặt Hàng</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $item)
                                <tr>
                                    <td>{{ ($bill->currentPage() - 1) * 5 + $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('order.bill_detail', ['id' => $item->id]) }}">
                                            {{ $item->user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->total }}</td>
                                    @if ($item->phone == null)

                                        <td>{{ $item->user->phone_number }}</td>
                                    @else
                                        <td>{{ $item->phone }}</td>
                                    @endif
                                    <td>{{ $item->payment }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button class="btn btn-danger" role="button" data-toggle="modal"
                                            data-target="#confirm_delete_{{ $item->id }}">Delete</button>
                                        <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Xác nhận xóa bản ghi này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="   {{ route('order.delete', ['id' => $item->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Không có dữ liệu</h2>
                @endif
                {{-- <div class="d-flex justify-content-end mr-3">
                    {{ $users->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
