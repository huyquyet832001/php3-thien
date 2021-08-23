<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>

    <base href="{{ asset('') }}}">
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

<body class="hold-transition login-page">
    {{-- <select name="" id="">
        @foreach (config('common.invoice.status') as $statusName => $statusValue)
            <option value="{{ $statusValue }}">
                {{ __('invoice.status.' . $statusName) }}
            </option>
        @endforeach
    </select> --}}
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg">ĐĂNG NHẬP</h3>
                <div>
                    @if (session('msg') != null)
                        <p style="color: red;" class="text-center">{{ session('msg') }}</p>
                    @endif
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
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
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>

                        </div>

                    </div>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="d-flex justify-content-end">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ghi Nhớ
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('registration') }}" class="btn btn-primary btn-block"> Đăng Ký</a>
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="admin-theme/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin-theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin-theme/dist/js/adminlte.min.js"></script>
</body>

</html>
