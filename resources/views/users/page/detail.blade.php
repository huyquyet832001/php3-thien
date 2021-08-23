@extends('users/layout')
@section('content-right')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-4">
                <img src="   {{ asset('storage/' . $product_detail->image) }}" class="img-fluid" alt="">
                <div class="mt-4 ml-5">
                    @isset($product_detail->galleries)
                        @foreach ($product_detail->galleries as $gl)
                            <img src="{{ asset('storage/' . $gl->url) }}" alt="" height="130px" width="130px">
                        @endforeach
                    @endisset
                </div>
            </div>
            <div class="col-4">
                <h2>{{ $product_detail->name }}</h2>
                @if ($product_detail->promotion_price == 0)
                    <div style="color:red; font-weight:bold;font-size:16px">Giá
                        Gốc:{{ number_format($product_detail->price) }}
                    </div>
                @else
                    <del style="color:black; font-weight:bold;font-size:16px">Giá
                        Gốc:{{ number_format($product_detail->price) }}
                    </del>
                    <div style="color:red; font-weight:bold;font-size:16px">Giảm Chỉ Còn:
                        {{ number_format($product_detail->promotion_price) }}</div>
                @endif

                <div class=" mt-5 " style="border:1px solid green;border-radius:15px">
                    <div
                        style="background: green; border-radius: 10px; color: #fff;width:170px;height:30px;margin-left:10px">
                        <h6 class="pl-2 mt-2" style="padding:5px 10px;margin-left:15px"><i
                                class="fas fa-gift me-2"></i>Khuyến Mại</h6>
                    </div>
                    <h6 class="pl-2 mt-2">Trả Góp 0%:</h6>
                    <ul class="pr-3">
                        <a href="" style="color:green; text-decoration: none;">
                            <li>Trả góp lãi suất 0% với Home Credit. Trả trước 50%, kỳ hạn 8 tháng (Áp dụng trên GIÁ NIÊM
                                YẾT, không áp dụng cùng các khuyến mại khác)</li>
                        </a>
                    </ul>
                    <h6 class=" pl-2">Khuyến Mại Hãng:</h6>
                    <ul class="pr-3">
                        <a href="" style="color:green; text-decoration: none;">
                            <li>[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá thêm tới 1 triệu</li>
                        </a>
                    </ul>
                </div>
                <div class="row mt-3">
                    @if (Auth::user() == null)
                        <div class="col-xl-6"><a type="button" href="{{ route('login') }}"
                                style="font-weight: bold;background:green;color:#fff;border-radius:10px"
                                class="btn  w-100">MUA
                                NGAY <br>(Giao Hàng Tận Nơi)</a></div>
                    @else
                        <div class="col-xl-6"><a type="button" href="{{ url('/AddCart/' . $product_detail->id) }}"
                                style="font-weight: bold;background:green;color:#fff;border-radius:10px"
                                class="btn  w-100">MUA
                                NGAY <br>(Giao Hàng Tận Nơi)</a></div>
                    @endif
                    <div class="col-xl-6 "><a type="button"
                            style="font-weight: bold;background:green;color:#fff;border-radius:10px " class="btn  w-100">TRẢ
                            GÓP 0% <br>(Xét Duyệt Online)</a></div>
                </div>

            </div>
            <div class="col-4">
                <div>
                    <ul class="list-group list-group-flush border" style="font-weight: bold;">
                        <li class="list-group-item list-group-item-dark">Di Động Xanh Cam Kết</li>
                        <li class="list-group-item list-group-item-action">
                            <div class="pl-3 me-2">
                                <i class="fas fa-thumbs-up" style="color:green"></i>
                                <span>Di Động Xanh cam kết tất cả sản phẩm đều mới 100%, nguyên seal, nguồn gốc rõ
                                    ràng</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action">
                            <div class="pl-3 me-2">
                                <i class="fas fa-thumbs-up" style="color:green"></i>
                                <span>
                                    Bảo hành chính hãng 12 tháng.
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="pl-3 me-2">
                                <i class="fas fa-thumbs-up" style="color:green"></i>
                                Lỗi là đổi mới trong 1 tháng tại hơn 2434 siêu thị toàn quốc
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="list-group list-group-flush border  mt-3" style="font-weight: bold;">
                        <li class="list-group-item list-group-item-dark">Hệ Thống Cửa Hàng</li>
                        <div class="overflow-auto border" style="max-height:210px">
                            <ul style="font-weight: bold;">
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 111 Trần Đăng Ninh, Cầu Giấy, Hà Nội (09.7673.2468) </span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 446 Xã Đàn, Đống Đa, Hà Nội (096.111.2468)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span>118 Thái hà, Đống Đa, Hà Nội (096.424.2468)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 312 Nguyễn Trãi, Trung Văn, Nam Từ Liêm, Hà Nội – Gần chợ Phùng Khoang
                                        (094.698.2468)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 380 Trần Phú, Ba Đình, TP.Thanh Hóa (096914.2468) </span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 107 Nguyễn Hữu Tiến – TT Đồng Văn – Duy Tiên – Hà Nam (0357.209.209)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> 418 Lạch Tray, Ngô Quyền, Hải Phòng (0949.16.2468)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> Phố Mới – Tân Dương, Thủy Nguyên, Hải Phòng (094.88.222.63)</span>
                                </li>
                                <li><i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> Ngã 3 Đông Yên, Yên Phong, Bắc Ninh (Khu công nghiệp Yên Phong)
                                        (094144.2468)</span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marked-alt me-2" style="color:green"></i>
                                    <span> Chung cư HillView, Khu Thái Bảo, Nam Sơn, TP. Bắc Ninh (091.154.2468) </span>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-8">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-info"
                                style="font-weight: bold;background:green;color:#fff;border-radius:10px"
                                data-toggle="collapse" href="#collapseOne">
                                Mô Tả Sản Phẩm
                            </button>
                            <button type="button" class="btn btn-info"
                                style="font-weight: bold;background:green;color:#fff;border-radius:10px"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Bình Luận Sản
                                Phẩm</button>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="overflow-auto " style="max-height:700px">
                                <p>{{ $product_detail->detail }}</p>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <!------------ form để bình luận ----------------->
                            @if (Auth::user() != null)
                                <h3 style="text-transform: uppercase;">Bình luận</h3>
                                <form action="comment/{{ $product_detail->id }}" method="POST">
                                    @csrf
                                    <textarea id="inputcommentPro" class="form-control" name="content" rows="4"></textarea>
                                    <br>
                                    <button type="submit" name="comment" class="btn"
                                        style="background:green;color:#fff;margin:0px 0px 10px 10px">Bình
                                        luận</button>
                                </form>
                            @endif
                            @foreach ($product_detail->comment as $item)
                                <div class="media ml-2">
                                    <div class="media-body">
                                        <div class="d-flex">
                                            <h5 class="media-heading">
                                                {{ $item->user->name }}</h5>
                                            <small class="ml-2 mt-1">{{ $item->created_at }}</small>
                                        </div>
                                        <p class="card-text">{{ $item->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
    use Illuminate\Support\Facades\Auth;
    @endphp
@endsection
