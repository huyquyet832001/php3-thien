@extends('users/layout')

@section('content-right')
    @include('users.banner')
    <div class="container">
        <h2 class="text-center mt-3"
            style="border-bottom:1px solid green;padding-bottom:20px; box-shadow: 0px 10px 6px -6px green ">
            Sản Phẩm Theo Danh Mục</h2>
        <div class="row row-cols-2 row-cols-lg-5 responsive g-0 mb-3 mt-3">
            @foreach ($product_category as $item)
                <div class="col">
                    <a href="{{ route('users.page.detail', ['id' => $item->id]) }}"
                        style="text-decoration: none;color:black">
                        <div class="card  text-center">
                            <div class="pt-2">
                                <img src="{{ asset('storage/' . $item->image) }}" width="200px" height="200px"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title" style="color:blue;">{{ $item->name }}</h6>
                                @if ($item->promotion_price == 0)

                                    <h5 style="font-size: 14px;font-weight: bold;">Giá
                                        Gốc:{{ number_format($item->price) }}đ</h5>

                                @else
                                    <del>
                                        <h5 style="font-size: 14px;font-weight: bold;">Giá
                                            Gốc:{{ number_format($item->price) }}đ</h5>
                                    </del>
                                    <h5 style="color: red;font-size: 14px;font-weight: bold;">Khuyễn
                                        Mại:{{ number_format($item->promotion_price) }}đ</h5>
                                @endif


                                <p style="font-size:15px"> {{ $item->detail }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class=" d-flex justify-content-end mr-5">
                {{ $product_category->links() }}
            </div>
        </div>
    </div>

@endsection
