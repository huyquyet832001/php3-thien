@extends('admin.layout.index')
@section('title')
    Quản Trị Products
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="keyword" @isset($searchData['keyword'])
                                    value="{{ $searchData['keyword'] }}" @endisset id="">
                            </div>
                            <div class="col-3">
                                <label for="">Danh Mục Sản Phẩm</label>
                                <select name="cate_id" id="">
                                    <option value="">Tất Cả</option>
                                    @foreach ($cates as $item)
                                        <option @if (isset($searchData['cate_id']) && $item->id == $searchData['cate_id']) selected @endif value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Sắp Xếp Theo</label>
                                <select name="order_by" id="">
                                    <option value="0">Mặc Định</option>
                                    <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 1) selected @endif value="1">Tên alphabet</option>
                                    <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
                                    <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 3) selected @endif value="3">Giá tăng dần</option>
                                    <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 4) selected @endif value="4">Giá giảm dần</option>
                                </select>
                            </div>
                            <div class="col-3 mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('product.create') }}" class="btn btn-success">
                                            Create
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if (!empty($data_product))
                    <table class="table table-striped">
                        <thead>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh </th>
                            <th>Danh Mục</th>
                            <th>Giá</th>
                            <th>Giá Khuyến Mãi</th>
                            <th>Miêu tả</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_product as $item)
                                <tr>
                                    <td>{{ ($data_product->currentPage() - 1) * 10 + $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" width="70" alt=""></td>

                                    <td> <a
                                            href="{{ route('category.detail', ['id' => $item->cate_id]) }}">{{ $item->category->name }}</a>
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->promotion_price }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $item->id]) }}"
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
                                                            action="{{ route('product.delete', ['id' => $item->id]) }}">
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
                    {{ $data_product->links() }}
                </div>
            @endsection
        </div>
    </div>
