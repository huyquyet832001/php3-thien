@extends('admin.layout.index')
@section('title')
    Quản Trị Tài Khoản
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tên Tài Khoản</label>
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
                @if (!empty($users))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số Điện Thoại</th>

                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Giới Tính</th>
                                <th scope="col">Quyền</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ ($users->currentPage() - 1) * 5 + $loop->iteration }}</td>
                                    <td> <a href="{{ route('account.user_order', ['id' => $item->id]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address }}</td>
                                    {{-- <td>{{ $item->invoices()->count() }}</td> --}}
                                    <td>{{ $item->gender == config('common.user.gender.Male') ? 'Nam' : 'Nữ' }}</td>
                                    <td>{{ $item->role == config('common.user.role.user') ? 'User' : 'Admin' }}</td>
                                    <td>
                                        <a href="{{ route('account.edit', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Update</a>
                                    </td>
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
                                                            action="{{ route('account.delete', ['id' => $item->id]) }}">
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
                <div class="d-flex justify-content-end mr-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
