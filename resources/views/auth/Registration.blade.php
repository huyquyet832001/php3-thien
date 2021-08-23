<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Ký Tài Khoản </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin-theme/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="admin-theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin-theme/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="">ĐĂNG KÝ</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">

                <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Họ Và Tên" name="name"
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="passwordAgain"
                            placeholder="Nhập Lại Mật Khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('passwordAgain')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone_number" placeholder="Số Điện Thoại"
                            value="{{ old('phone_number') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    @error('phone_number')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <select class=" form-control" name="gender" style="-webkit-appearance: none;">
                            <option value="{{ config('common.user.gender.male') }}"
                                {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male') ? 'selected' : '' }}>
                                Nam</option>
                            <option value="{{ config('common.user.gender.female') }}"
                                {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female') ? 'selected' : '' }}>
                                Nữ</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mars"></span>
                            </div>
                        </div>
                    </div>
                    @error('gender')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Địa Chỉ"
                            value="{{ old('address') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marked-alt"></span>
                            </div>
                        </div>
                    </div>
                    @error('address')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <!-- /.col -->
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                    </div>
                    <!-- /.col -->
                    <div class="social-auth-links text-center">
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Sign up using Google+
                        </a>
                    </div>

            </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="admin-theme/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin-theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin-theme/dist/js/adminlte.min.js"></script>
</body>

</html>
