@extends('admin.layout.index')
@section('title')
    Sửa Danh Mục Sản Phẩm
@endsection
@section('contents')
    <form method="POST" class="mt-5" enctype="multipart/form-data" action="">
        @csrf
        <div class="mt-3">
            <label>Tên Sản Phẩm</label>
            <input class="mt-3 form-control" type="text" name="name" value="{{ $model->name }}" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <a href="{{ route('category.index') }}" class="mt-3 btn btn-primary ml-3">Hủy</a>
            <button class="mt-3 btn btn-primary ml-3">Update</button>
        </div>
    </form>
@endsection
