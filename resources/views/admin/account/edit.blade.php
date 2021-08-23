@extends('admin.layout.index')
@section('title')
    Sửa Tài Khoản
@endsection
@section('contents')
    <div>
        @if (session('thongbao') != null)
            <p style="color: red;" class="text-center">{{ session('thongbao') }}</p>
        @endif
    </div>
    <form method="POST" class="mt-5" enctype="multipart/form-data" action="">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Họ Và Tên</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $model->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" readonly
                    value="{{ $model->email }}" name="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Địa Chỉ</label>
                <input type="text" class="form-control" placeholder="Address" name="address"
                    value="{{ $model->address }}">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone_number" value="{{ $model->phone_number }}">
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="">Giới Tính</label>
                <select name="gender" class="form-control" id="">
                    <option value="0" {{ $model->gender == 0 ? 'selected' : '' }}>male</option>
                    <option value="1" {{ $model->gender == 1 ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="">Quyền</label>
                <select name="role" class="form-control" id="">
                    <option value="0" {{ $model->role == 0 ? 'selected' : '' }}>User</option>
                    <option value="1" {{ $model->role == 1 ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
