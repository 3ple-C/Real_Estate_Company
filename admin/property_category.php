<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Royal Haven Homes - & Lands Integrated Services</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Nunito:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">


    <!-- Plugin css -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/creat-listing.css">
    <link rel="stylesheet" href="assets/css/dark.css">

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.documentElement.classList.add("dark");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.documentElement.classList.remove("dark");
        }
    </script>

</head>

<body>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="loader--border"></div>
    </div>
    <!-- Preloader end -->
    <div class="dashboard__page--wrapper">
        <?php include 'admin_inc/sidebar.php' ?>
        <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
            <?php include 'admin_inc/header.php' ?>
            <main class="main__content_wrapper">
                <!-- dashboard container -->
                <div class="dashboard__container add__property--container">
                    <div class="add__property--heading mb-30">
                        <h2 class="add__property--heading__title">Add New Property Category</h2>
                        <p class="add__property--desc">We are glad to see you again!</p>
                    </div>
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?= $_SESSION['message-type'] ?>">
                            <p><?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                unset($_SESSION['message-type']);
                                ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="../functions/admin_addCategory.php" method="post">
                        <div class="add__property--step ">
                            <div class="add__property--step__inner">
                                <div class="add__property--box mb-30 p-5">
                                    <h3 class="add__property--box__title mb-20">Create category</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="input1">Name</label>
                                                <input class="add__listing--input__field" id="input1" placeholder="Category Name" type="text" name="category">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input class="solid__btn add__property--btn" type="submit" id="submit" value="Add Category" />
                    </form>
                </div>
                <!-- dashboard container .\ -->
                <a href="../functions/logout.php"></a>
                <!-- Start footer section -->
                <?php include 'admin_inc/footer.php' ?>

                <!-- End footer section -->
            </main>
        </div>


    </div>

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>


    <script>
        document.getElementsByTagName('form').addEventListener('submit', (event) => {
            event.preventDefault();
        });
    </script>

    <!-- All Script JS Plugins here  -->
    <script src="assets/js/vendor/popper.js" defer="defer"></script>
    <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/glightbox.min.js"></script>


    <!-- Customscript js -->
    <script src="assets/js/script.js"></script>

    <!-- Dark to light js -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.getElementById("light__to--dark")?.classList.add("dark--version");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.getElementById("light__to--dark")?.classList.remove("dark--version");
        }
    </script>


</body>

</html>