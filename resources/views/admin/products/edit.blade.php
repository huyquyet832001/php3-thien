@extends('admin.layout.index')
@section('title')
    Sửa Sản Phẩm
@endsection
@section('contents')
    <form method="POST" class="mt-5" enctype="multipart/form-data" action="">
        @csrf
        <div class="mt-3">
            <label>Tên Sản Phẩm</label>
            <input class="mt-3 form-control" type="text" name="name" value="{{ $model->name }}" />
            {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="mt-3">
            <label>Giá Gốc</label>
            <input class="mt-3 form-control" type="text" name="price" value="{{ $model->price }}" />
            {{-- @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="mt-3">
            <label>Giá Khuyến Mại</label>
            <input class="mt-3 form-control" type="text" name="quantity" value="{{ $model->promotion_price }}" />
            {{-- @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="mt-3">
            <label>Số Lương</label>
            <input class="mt-3 form-control" type="text" name="quantity" value="{{ $model->quantity }}" />
            {{-- @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="mt-3">
            <label>Danh Mục Sản Phẩm</label>
            <select class="custom-select rounded-0" name="cate_id" id="exampleSelectRounded0">
                @foreach ($cates as $rel)
                    <option value="{{ $rel->id }}" @if ($rel->id == $model->cate_id) selected @endif>{{ $rel->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label>Ảnh Sản Phẩm</label>
            <input type="file" name="uploadfile" class="mt-3 form-control" id="image">
            <input type="hidden" name="image" value="{{ $model->image }}" class=" mt-3 form-control" id="image">
            <img src="{{ asset('storage/' . $model->image) }}" width="150px" alt="">

        </div>
        <div class="col-md-12">
            <input type="hidden" name="removeGalleryIds" value="">
            <table class="table table-stripped">
                <thead>
                    <th>File</th>
                    <th>Thumbnail</th>
                    <th>
                        <button class="btn btn-success add-img" type="button">Thêm ảnh</button>
                    </th>
                </thead>
                <tbody id="gallery">
                    @foreach ($model->galleries as $gl)
                        <tr id="{{ $gl->id }}">
                            <td>{{ $gl->url }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $gl->url) }}" width="80">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"
                                    onclick="removeGalleryImg(this, {{ $gl->id }})">Xóa</button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="mt-3">
            <label for="">Chi Tiết Sản Phẩm</label>
            <textarea name="detail" id="" cols="30" class="mt-3 form-control " rows="10">{{ $model->detail }}</textarea>
        </div>
        <div>
            <button class="mt-3 btn btn-primary">Update</button>
            <a href="{{ route('product.index') }}" class="mt-3 btn btn-primary">Hủy</a>
        </div>
    </form>
@endsection
@section('pagejs')
    <script>
        $(document).ready(function() {
            $('.add-img').click(function() {
                var rowId = Date.now();
                $('#gallery').append(`
                <tr id="${rowId}">
                    <td>
                        <div class="form-group">
                            <input row_id="${rowId}" type="file" name="galleries[]" class="form-control" onchange="loadFile(event, ${rowId})">
                        </div>
                    </td>
                    <td>
                        <img row_id="${rowId}" src="" width="80">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="removeGalleryImg(this)">Xóa</button>
                    </td>
                </tr>
            `);
            })
        })

        function removeGalleryImg(el, galleryId = 0) {
            $(el).parent().parent().remove();
            if (galleryId != 0) {
                let removeIds = $(`[name="removeGalleryIds"]`).val();
                removeIds += `${galleryId}|`
                $(`[name="removeGalleryIds"]`).val(removeIds);
            }
        }

        function loadFile(event, el_rowId) {
            var reader = new FileReader();
            var output = document.querySelector(`img[row_id="${el_rowId}"]`);
            reader.onload = function() {
                output.src = reader.result;
            };
            if (event.target.files[0] == undefined) {
                output.src = "";
                return false;
            } else {
                reader.readAsDataURL(event.target.files[0]);
            }
        };
    </script>

@endsection
