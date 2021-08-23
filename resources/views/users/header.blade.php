<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Hello, world!</title>

    <style>
        .login>a {
            color: #fff;
            margin-right: 15px;
            text-decoration: none
        }

        .login {
            line-height: 40px
        }

        .login>a:hover {
            color: #fff
        }

        .header {
            height: 50px;
            background: green;
            color: #fff;
        }

        .card {
            width: 100%;
            height: 100%;
        }

        .card .card-title {
            color: black;
            font-weight: bold;
        }

    </style>
</head>
@php
use Illuminate\Support\Facades\Auth;
@endphp

<body>

    @if (Session::has('thongbaodathang'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('thongbaodathang') }}
        </div>
    @endif
    <header>
        <div class="container-fluid header">
            <div class="d-flex justify-content-between">
                <h5 class="pt-2 mt-1">CÔNG TY TNHH DI ĐỘNG XANH</h5>
                <div class="login pt-1">
                    @if (Auth::user() == null)
                        <a href="{{ route('login') }}"><i class="fa fa-user me-2"></i>ĐĂNG NHẬP</a>
                    @else
                        <a href="{{ route('account.index') }}"> <i class="fa fa-user "></i>
                            {{ Auth::user()->name }}</a>

                        <a href="{{ route('logout') }}">Đăng Xuất</a>
                    @endif
                    <a href="{{ route('users.page.cart') }}"> <i class="fas fa-cart-plus"></i>
                        @if (Auth::user() == null ? Session::forget('cart') : '')
                            @if (Session::has('cart'))
                                {{ Session('cart')->totalQty }}
                            @else Trống
                            @endif
                        @else
                            @if (Session::has('cart'))
                                {{ Session('cart')->totalQty }}
                            @else Trống @endif
                        @endif
                    </a>
                    <a href="#"><i class="fa-1x fab fa-facebook mt-1" style="color: #fff;"></i></a>
                    <a href="#"><i class="fa-1x fab fa-instagram mt-1" style="color: #fff;"></i></a>
                    <a href="#"><i class="fa-1x fab fa-twitter mt-1" style="color: blue;"></i></a>
                    <a href="#"><i class="fa-1x fab fa-youtube mt-1" style="color: red; "></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid left">
                    <a class="navbar-brand" href="#"><img src="image/didongxanh-logo1.png" width="150px" height="50px"
                            alt="" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.page.index') }}" style="color: black"><i
                                        class="fa-1x fas fa-home me-2"></i>Trang Chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: black"><i
                                        class="fa-1x fas fa-envelope-open-text me-2"></i>Giới
                                    Thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: black"><i
                                        class="fa-1x fas fa-bars me-2"></i>Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: black"><i
                                        class="fa-1x fas fa-file-alt me-2"></i>Tin Tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: black"><i
                                        class="fa-1x fas fa-phone-alt me-2"></i>Liên Hệ</a>
                            </li>
                            <li class="ml-5 mt-2">
                                <form class="d-flex">
                                    <input class="form-control me-2" name="keyword" @isset($searchData['keyword'])
                                        value="{{ $searchData['keyword'] }}" @endisset
                                        placeholder="Bạn Muốn Tìm Gì..." aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit" style="width:200px">Tìm
                                        Kiếm</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>

</html>
