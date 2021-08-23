@extends('admin.layout.index')
@section('title')
    Thêm mới Tin Tức
@endsection
@section('contents')
    <form method="POST" class="mt-5" enctype="multipart/form-data" action="">
        @csrf
        <div class="mt-3">
            <label>Tiêu Đề</label>
            <input class="mt-3 form-control" type="text" name="title" value="{{ old('title') }}" />
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-3">
            <label>Nội Dung</label>
            <textarea name="content" id="" cols="30" class="mt-3 form-control" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-3">
            <label>Ảnh Sản Phẩm</label>
            <input class="mt-3 form-control" type="file" name="uploadfile" />
            @error('uploadfile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="mt-3 btn btn-primary">Create</button>
            <a href="{{ route('new.index') }}" class="mt-3 btn btn-primary">Hủy</a>
        </div>
    </form>
@endsection
