<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICS-Notes | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ 'AdminLte/plugins/fontawesome-free/css/all.min.css' }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ 'AdminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css' }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'AdminLte/dist/css/adminlte.min.css' }}">
</head>

<body class="hold-transition register-page">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
            </button>
        </div>
    @endif
    <div class="register-box">
        <div class="register-logo">
            <b>ICS</b>-Notes
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new account</p>

                <form action="/register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Name" required
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $messages }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email" required
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-7">
                            <a href="/" class="text-right">I already have an Account</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ 'AdminLte/plugins/jquery/jquery.min.js' }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'AdminLte/dist/js/adminlte.min.js' }}"></script>
</body>

</html>
