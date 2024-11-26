<?php session_start(); ?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message-type'] ?>">
        <p><?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['message-type']);
            ?></p>
    </div>
<?php endif; ?>

<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Royal Haven Homes - & Lands Integrated Services</title>
    <meta name="description" content="Royal Haven Homes - & Lands Integrated Services">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Nunito:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">


    <!-- Plugin css -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://kit.fontawesome.com/6ab2133fe6.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Preloader start -->
    <!-- <div id="preloader">
        <div class="loader--border"></div>
    </div> -->
    <!-- Preloader end -->

    <!-- Start header area -->
    <header class="header__section">
        <div class="header__sticky">
            <div class="container-fluid">
                <div class="main__header d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512">
                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                            </svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo image-responsive">
                        <a class="main__logo--link" href="index.php">

                            <img class="main__logo--img" src="assets/img/main_pics/20230221_204247.png" alt="logo-img">

                        </a>
                    </div>
                    <div class="main__menu d-none d-lg-block">
                        <nav class="main__menu--navigation">
                            <ul class="main__menu--wrapper d-flex">
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="index.php">
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 0L0 4.125V11H3.72581V8.59381C3.72581 7.64165 4.51713 6.87506 5.5 6.87506C6.48287 6.87506 7.27419 7.64165 7.27419 8.59381V11H11V4.125L5.5 0Z" fill="#bf9839" />
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="about.php">
                                        About us
                                    </a>
                                </li>
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="services-details.php">
                                        Services
                                    </a>
                                </li>
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="project.php"> Properties </a>
                                </li>
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="listing.php"> Listing </a>
                                </li>
                                <li class="main__menu--items">
                                    <a class="main__menu--link" href="contact.php">Contact us
                                    </a>
                                </li>
                                <!-- <li class="main__menu--items">
                                    <a class="main__menu--link" href="#"> Pages </a>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                    <div class="main__header--right d-flex align-items-center">
                        <a class="login__register--link" href="login.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg> <span>Login </span></a>
                        <a class="add__listing--btn solid__btn" href="sign-up.php"><span>Rgister</span> <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15.9992C12.4111 15.9992 16 12.4105 16 7.99962C16 3.58875 12.411 0 8 0C3.58901 0 0 3.58875 0 7.99962C0 12.4105 3.58901 15.9992 8 15.9992ZM4.19508 7.57155H7.57197V4.19439C7.57197 3.95805 7.76381 3.76636 8 3.76636C8.23634 3.76636 8.42804 3.95821 8.42804 4.19439V7.57155H11.8049C12.0413 7.57155 12.233 7.7634 12.233 7.99958C12.233 8.23592 12.0411 8.42762 11.8049 8.42762H8.42804V11.8046C8.42804 12.041 8.23619 12.2327 8 12.2327C7.76366 12.2327 7.57197 12.0408 7.57197 11.8046V8.42762H4.19508C3.95874 8.42762 3.76704 8.23577 3.76704 7.99958C3.76704 7.76324 3.9586 7.57155 4.19508 7.57155Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End header area -->


    <!-- Start Offcanvas header menu -->

    <div class="offcanvas__header">
        <div class="offcanvas__inner">
            <div class="offcanvas__logo ">
                <a class="offcanvas__logo_link image-responsive" href="index.php">
                    <img class="main__logo--img" src="assets/img/main_pics/20230221_204247.png" alt="logo-img">
                </a>
                <button class="offcanvas__close--btn" data-offcanvas>close</button>
            </div>

            <nav class="offcanvas__menu">
                <ul class="offcanvas__menu_ul">
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="index.php">Home</a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="about.php">About</a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="services-details.php">Services</a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="listing.php">Listing</a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="project.php">Properties</a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="contact.php">Contact</a>
                    </li>
                </ul>
            </nav>

            <a class="add__listing--btn offcanvas__listing--btn solid__btn" href="sign-up.php"><span>Register</span> <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 15.9992C12.4111 15.9992 16 12.4105 16 7.99962C16 3.58875 12.411 0 8 0C3.58901 0 0 3.58875 0 7.99962C0 12.4105 3.58901 15.9992 8 15.9992ZM4.19508 7.57155H7.57197V4.19439C7.57197 3.95805 7.76381 3.76636 8 3.76636C8.23634 3.76636 8.42804 3.95821 8.42804 4.19439V7.57155H11.8049C12.0413 7.57155 12.233 7.7634 12.233 7.99958C12.233 8.23592 12.0411 8.42762 11.8049 8.42762H8.42804V11.8046C8.42804 12.041 8.23619 12.2327 8 12.2327C7.76366 12.2327 7.57197 12.0408 7.57197 11.8046V8.42762H4.19508C3.95874 8.42762 3.76704 8.23577 3.76704 7.99958C3.76704 7.76324 3.9586 7.57155 4.19508 7.57155Z" fill="white" />
                </svg>
            </a>

            <div class="side__menu--footer mobile__menu--footer">
                <div class="side__menu--info">
                    <div class="side__menu--info__list">
                        <h3 class="side__menu--info__title">Customer Care Phone</h3>
                        <p><a class="side__menu--info__text" href="tel:+2348164441825">: (+234) 816 444 1825</a></p>
                    </div>
                    <div class="side__menu--info__list">
                        <h3 class="side__menu--info__title">Need Live Support?</h3>
                        <p><a class="side__menu--info__text" href="mailto:info@royalhavenproperties.com">Info@royalhavenproperties.com</a></p>
                    </div>
                </div>
                <div class="side__menu--share d-flex align-items-center">
                    <h3 class="side__menu--share__title">Follow us :</h3>
                    <ul class=" side__menu--share__wrapper d-flex align-items-center">
                        <li class="side__menu--share__list">
                            <a class="side__menu--share__icon" target="_blank" href="https://www.facebook.com/Royahavenhomes?mibextid=LQQJ4d
                                <svg width=" 10" height="17" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="side__menu--share__list">
                            <a class="footer__social--icon" target="_blank" href="tel:+2348164441825">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span class="visually-hidden">Whatsapp</span>
                                <a>
                        </li>
                        <li class="side__menu--share__list">
                            <a class="side__menu--share__icon" target="_blank" href="https://www.instagram.com/obikwelu_macben?igsh=ZTh5ZnEybHRnNDU4">
                                <svg width="16" height="16" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Instagram</span>
                            </a>
                        </li>
                        <li class="side__menu--share__list">
                            <a class="footer__social--icon" target="_blank" href="https://www.tiktok.com/@royalhavenhomes?_t=8ZCNJtEb8Jq&_r=1">
                                <i class="fa-brands fa-tiktok"></i>
                                <span class="visually-hidden">Tiktok</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Offcanvas header menu -->