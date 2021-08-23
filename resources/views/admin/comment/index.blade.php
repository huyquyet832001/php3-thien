@extends('admin.layout.index')
@section('title')
    Quản Trị Bình Luận
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                @if (!empty($comments))
                    <table class="table table-striped">
                        <thead>
                            <th>STT</th>
                            <th>Tài Khoản</th>
                            <th>Sản Phẩm</th>
                            <th>Nội Dung</th>
                            <th>Ngày Bình Luận</th>
                            <th colspan="1">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($comments as $item)
                                <tr>
                                    <td>{{ ($comments->currentPage() - 1) * 10 + $loop->iteration }}</td>
                                    <td> {{ $item->user->name }}</td>
                                    <td> {{ $item->product->name }}</td>
                                    <td>{{ $item->content }}</td>
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
                                                            action="  {{ route('comment.delete', ['id' => $item->id]) }}">

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
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
