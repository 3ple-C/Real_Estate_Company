<?php include 'inc/header2.php' ?>

<main class="main__content_wrapper">

    <!-- Breadcrumb section -->
    <section class="breadcrumb__section section--padding">
        <div class="container">
            <div class="breadcrumb__content text-center">
                <h1 class="breadcrumb__title h2"><span>Sign </span> Up</h1>
                <ul class="breadcrumb__menu d-flex justify-content-center">
                    <li class="breadcrumb__menu--items"><a class="breadcrumb__menu--link" href="index.php">Home</a></li>
                    <li><span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.22321 4.65179C5.28274 4.71131 5.3125 4.77976 5.3125 4.85714C5.3125 4.93452 5.28274 5.00298 5.22321 5.0625L1.0625 9.22321C1.00298 9.28274 0.934524 9.3125 0.857143 9.3125C0.779762 9.3125 0.71131 9.28274 0.651786 9.22321L0.205357 8.77679C0.145833 8.71726 0.116071 8.64881 0.116071 8.57143C0.116071 8.49405 0.145833 8.4256 0.205357 8.36607L3.71429 4.85714L0.205357 1.34821C0.145833 1.28869 0.116071 1.22024 0.116071 1.14286C0.116071 1.06548 0.145833 0.997023 0.205357 0.9375L0.651786 0.491071C0.71131 0.431547 0.779762 0.401785 0.857143 0.401785C0.934524 0.401785 1.00298 0.431547 1.0625 0.491071L5.22321 4.65179Z" fill="#706C6C" />
                            </svg>
                        </span></li>
                    <li><span class="breadcrumb__menu--text">Sign Up </span></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section .\ -->

    <!-- Account Page section -->
    <section class="account__page--section section--padding">
        <div class="container">
            <div class="account__section--inner">
                <div class="account__tab--btn">
                    <ul class="account__tab--btn__wrapper d-flex justify-content-center">
                        <li class="account__tab--btn__items"><span class="account__tab--btn__field active">Sign Up</span></li>
                        <li class="account__tab--btn__items"><a class="account__tab--btn__field" href="login.php">Login</a></li>
                    </ul>
                </div>
                <div class="account__form--wrapper">
                    <div class="account__header text-center mb-30">
                        <h2 class="account__title">Sign Up Today!</h2>
                        <p class="account__desc">Enter your details to create an account</p>
                    </div>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            unset($_SESSION['message_type']);
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            unset($_SESSION['message_type']);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="account__form">
                        <form action="functions/registration.php" method="post">
                            <div class="account__form--input mb-30">
                                <label class="account__form--input__label mb-12" for="name">Your Name</label>
                                <input class="account__form--input__field" id="name" placeholder="Enter your name*" type="text" name="name">
                            </div>
                            <div class="account__form--input mb-30">
                                <label class="account__form--input__label mb-12" for="email">Email Address</label>
                                <input class="account__form--input__field" id="email" placeholder="Enter Email Adress" type="email" name="email">
                            </div>
                            <div class="account__form--input mb-30">
                                <label class="account__form--input__label mb-12" for="password">New Password</label>
                                <div class="account__form--create__password position-relative">
                                    <input class="account__form--input__field" id="password" placeholder="Create password" type="password" name="password">
                                    <a href="javascript:void(0)" class="account__form--password__show--icon"><svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 10C2.76587 10 0.170875 5.437 0.063 5.24288C-0.021 5.09175 -0.021 4.90812 0.063 4.757C0.170875 4.563 2.76587 0 8 0C13.2341 0 15.8291 4.563 15.937 4.75712C16.021 4.90825 16.021 5.09188 15.937 5.243C15.8291 5.437 13.2341 10 8 10ZM1.08837 4.99925C1.68313 5.90062 4.01825 9 8 9C11.9944 9 14.3191 5.90312 14.9116 5.00075C14.3169 4.09937 11.9818 1 8 1C4.00562 1 1.68087 4.09688 1.08837 4.99925ZM8 8C6.34575 8 5 6.65425 5 5C5 3.34575 6.34575 2 8 2C9.65425 2 11 3.34575 11 5C11 6.65425 9.65425 8 8 8ZM8 3C6.89725 3 6 3.89725 6 5C6 6.10275 6.89725 7 8 7C9.10275 7 10 6.10275 10 5C10 3.89725 9.10275 3 8 3Z" fill="#817F7E"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <p class="account__form--condition position-relative m-0">
                                <label class="account__form--condition__label" for="condition">I agree to all Terms & <span>Condition</span> and Feeds</label>
                                <input class="account__form--condition__input" id="condition" type="checkbox" name="checkbox">
                                <span class="account__form--condition__checkmark"></span>
                            </p>
                            <input class="account__form--btn solid__btn" type="submit" value="Creat An Account">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Account Page section .\ -->

    <?php include 'inc/footer2.php' ?>

</main>


<!-- Scroll top bar -->
<button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
    </svg></button>

<!-- All Script JS Plugins here  -->
<script src="assets/js/vendor/popper.js" defer="defer"></script>
<script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/glightbox.min.js"></script>
<script src="assets/js/plugins/aos.js"></script>


<!-- Customscript js -->
<script src="assets/js/script.js"></script>



</body>

</html>