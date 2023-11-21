<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">


<!-- Mirrored from spruko.com/demo/django/ynex/ynex/dist/html/sign-in-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Oct 2023 17:30:41 GMT -->

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta name="Description" content="Ynex - Django Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="django admin theme, bootstrap 5 admin template, admin bootstrap 5, django template, django, dashboard bootstrap 5, bootstrap admin, template design, template dashboard, bootstrap admin template, admin template, bootstrap 5 admin, bootstrap dashboard, bootstrap admin theme, admin dashboard bootstrap.">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets') }}/images/brand-logos/favicon.ico" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('assets') }}/js/authentication-main.js"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets') }}/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('assets') }}/css/styles.min.css" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
                        <form action="{{ route('auth') }}" method="POST">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="email" class="form-label text-default">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        id="signin-username" placeholder="example@example">
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="password" class="form-label text-default d-block">Password<a
                                            href="reset-password-basic.html" class="float-end text-danger">Forget
                                            password
                                            ?</a></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="password">
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="fa-solid fa-eye-slash align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('assets') }}/js/show-password.js"></script>

</body>


<!-- Mirrored from spruko.com/demo/django/ynex/ynex/dist/html/sign-in-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Oct 2023 17:30:41 GMT -->

</html>
