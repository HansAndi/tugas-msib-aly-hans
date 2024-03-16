<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script type="module" src="http://[::1]:5173/@vite/client"></script>
    <script type="module" src="http://[::1]:5173/resources/js/app.js"></script> -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <!-- Footer -->
                        <div class="login-brand">
                            <img src="<?= BASE_URL; ?>/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <!-- Content -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= BASE_URL; ?>/login/login" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control " value="" name="username" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control " name="password">

                                    </div>

                                    <div class="form-group d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="text-muted mt-5 text-center">
                            Don't have an account? <a href="<?= BASE_URL; ?>/login/register">Create One</a>
                        </div>

                        <!-- Footer -->
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= BASE_URL; ?>/js/jquery.min.js"></script>
    <script src="<?= BASE_URL; ?>/js/popper.js"></script>
    <script src="<?= BASE_URL; ?>/js/tooltip.js"></script>
    <script src="<?= BASE_URL; ?>/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL; ?>//js/jquery.nicescroll.min.js"></script>
    <script src="<?= BASE_URL; ?>/js/moment.min.js"></script>
    <script src="<?= BASE_URL; ?>/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= BASE_URL; ?>/js/scripts.js"></script>
    <script src="<?= BASE_URL; ?>/js/custom.js"></script>
</body>

</html>