@extends('admin.layout.index')
@section('title')
    Quản Trị Tin Tức
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tên Tin Tức</label>
                                <input type="text" name="keyword" @isset($searchData['keyword'])
                                    value="{{ $searchData['keyword'] }}" @endisset>
                            </div>
                            <div class="col-3 mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('new.create') }}" class="btn btn-success">
                                            Create
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if (!empty($news))
                    <table class="table table-striped">
                        <thead>
                            <th>STT</th>
                            <th>Tiêu Đề</th>
                            <th>Ảnh </th>
                            <th>Nội Dung</th>
                            <th colspan="1">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ ($news->currentPage() - 1) * 5 + $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" width="70" alt=""></td>
                                    <td>{{ $item->content }}</td>

                                    <td>
                                        <a href="{{ route('new.edit', ['id' => $item->id]) }} "
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
                                                            action="  {{ route('new.delete', ['id' => $item->id]) }}">

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
                    {{ $news->links() }}
                </div>
            @endsection
        </div>
    </div>
