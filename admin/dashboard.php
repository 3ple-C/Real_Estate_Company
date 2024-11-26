<?php
session_start();

// Check the role of the current logged in user
if ((!isset($_SESSION['user_role'])) || $_SESSION['user_role'] !== 'admin') {
    # If the user is not an admin, redirect to an error/dashboard page
    $_SESSION['message'] = 'Access denied. You are not authorized to access this page';
    $_SESSION['message-type'] = 'danger';
    header('Location:../index.php');
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location:../login.php');
    exit;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Royal Haven's Home | Real Estate Agency</title>
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

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
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

    <style>
        .dashboard__chart--box__inner {
            height: 317px;
            padding-left: 0px;
        }

        .sold-out__progress-bar__field {
            max-width: 200px;
            width: 100%;
        }
    </style>

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

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert  alert-<?php echo $_SESSION['message-type']; ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['message-type']);
                    ?>
                </div>
            <?php endif; ?>
            <main class="main__content_wrapper">
                <!-- dashboard container -->
                <div class="dashboard__container d-flex">
                    <div class="main__content--left">
                        <div class="main__content--left__inner">
                            <!-- Welcome section -->
                            <div class="welcome__section d-flex align-items-center">
                                <div class="welcome__content">
                                    <h2 class="welcome__content--title">Welcome <?php echo $_SESSION['user_name'] ?></h2>
                                    <p class="welcome__content--desc mb-1">Your Role is <?php echo $_SESSION['user_role'] ?></p>
                                    <p class="welcome__content--desc">This is the Admin Dashboard</p>

                                </div>
                                <div class="welcome__thumbnail">
                                    <img src="assets/img/dashboard/welcome-thumbnail.png" alt="img">
                                </div>
                            </div>
                            <!-- Welcome section .\ -->

                        </div>
                    </div>

                </div>
                <!-- dashboard container .\ -->

                <?php include 'admin_inc/footer.php' ?>
            </main>
        </div>


    </div>

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

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

    <!-- Chart JS -->
    <script src="../../../../../cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Customscript js -->
    <script src="assets/js/chart-activation.js"></script>


</body>
</html>