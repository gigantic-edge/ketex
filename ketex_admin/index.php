<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<?php
session_start();
?>
<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>KETEX</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!--end::Web font -->

        <!--begin::Global Theme Styles -->
        <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

        <!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

        <!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

        <!--end::Global Theme Styles -->
        <!--<link rel="shortcut icon" href="image/fa-icon.png" />-->
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(assets/app/media/img//bg/bg-1.jpg);">
                <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
<!--                                <img src="image/Sampurna-logo.jpg">-->
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Sign In To Admin</h3>
                            </div>
                            <form class="m-login__form m-form" action="db-login.php" method="post">
                                <?php
                                if (isset($_SESSION['login_failed'])) {
                                    ?>
                                    <div class="m-alert m-alert--outline alert alert alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        <span>
                                            <?php
                                            echo $_SESSION['login_failed'];
                                            ?>
                                        </span>
                                    </div>
                                    <?php
                                    unset($_SESSION['login_failed']);
                                }
                                ?>

                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off" required>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="row m-login__form-sub">
                                    <!--                                    <div class="col m--align-left m-login__form-left">
                                                                            <label class="m-checkbox  m-checkbox--light">
                                                                                <input type="checkbox" name="remember"> Remember me
                                                                                <span></span>
                                                                            </label>
                                                                        </div>-->
                                    <div class="col m--align-right m-login__form-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Sign In</button>
                                </div>
                            </form>
                        </div>

                        <div class="m-login__forget-password">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Forgotten Password ?</h3>
                                <div class="m-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <form class="m-login__form m-form" action="">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
                                    <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!--begin::Global Theme Bundle -->
        <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts -->
        <script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>

        <!--end::Page Scripts -->
    </body>

    <!-- end::Body -->
</html>