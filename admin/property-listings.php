<?php
session_start();

include_once '../functions/dbconn.php';
include_once '../functions/Properties.php';

$database = new Database();
$db = $database->getConnection();

$property = new Property($db);
$properties = $property->getAllProperties();

?>

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

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/table.css">
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
            <!-- Start header area -->
            <?php include 'admin_inc/header.php' ?>
            <!-- End header area -->
            <main class="main__content_wrapper">
                <!-- dashboard container -->
                <div class="dashboard__container dashboard__reviews--container">
                    <div class="reviews__heading mb-30">
                        <h2 class="reviews__heading--title">My Properties</h2>
                        <p class="reviews__heading--desc">We are glad to see you again!</p>
                    </div>

                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert  alert-<?php echo $_SESSION['message-type']; ?>">
                            <?php echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            unset($_SESSION['message-type']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <div class="properties__wrapper">
                        <div class="properties__table table-responsive">
                            <table class="properties__table--wrapper">
                                <thead>
                                    <tr>
                                        <th>Listing Title</th>
                                        <th>Date Listed</th>
                                        <th><span class="">Category</span></th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($properties as $property): ?>
                                        <?php if ($property['category'] === 'Lands'): ?>
                                            <tr>
                                                <td>
                                                    <div class="properties__author d-flex align-items-center">
                                                        <div class="properties__author--thumb " style="width: 64px; height: 64px;">
                                                            <img class="rounded-3 w-100 h-100" src="../functions/<?php echo $property['image'] ?>" alt="img">
                                                        </div>
                                                        <div class="reviews__author--text">
                                                            <h3 class="reviews__author--title"><?php echo $property['name'] ?></h3>
                                                            <p class="reviews__author--subtitle"><?php echo $property['address'] ?></p>
                                                            <span class="properties__author--price"><?php echo $property['price'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span class="reviews__date"><?php echo $property['create_at'] ?></span>
                                                </td>
                                                <td>
                                                    <span class="status__btn 
                                                    <?php
                                                    if ($property['category'] === 'Cars') {
                                                        echo 'pending';
                                                    } elseif ($property['category'] === 'Buildings/Houses') {
                                                        echo 'active';
                                                    } else {
                                                        echo 'processing';
                                                    }
                                                    ?>
                                                    
                                                    "><?php echo $property['category'] ?></< /span>
                                                </td>
                                                <td>
                                                    <span class="properties__views"><?php echo $property['area_size'] ?></span>
                                                </td>
                                                <td>
                                                    <span class="properties__views"><?php echo $property['price'] ?></span>
                                                </td>
                                                <td>
                                                    <div class="reviews__action--wrapper position-relative">
                                                        <button class="reviews__action--btn" aria-label="action button" type="button" aria-expanded="true" data-bs-toggle="dropdown"><svg width="3" height="17" viewBox="0 0 3 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="1.5" cy="1.5" r="1.5" fill="currentColor" />
                                                                <circle cx="1.5" cy="8.5" r="1.5" fill="currentColor" />
                                                                <circle cx="1.5" cy="15.5" r="1.5" fill="currentColor" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu sold-out__user--dropdown ">
                                                            <li><a href="./edit-properties.php?id=<?php echo $property['id'] ?>">Edit <?php echo $property['id'] ?></a></li>
                                                            <li><a href="../functions/delete-property.php?id=<?php echo $property['id'] ?>" onclick="return confirm('Are you sure you want to delete this property?')">Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination__area">
                            <nav class="pagination justify-content-center">
                                <ul class="pagination__menu d-flex align-items-center justify-content-center">
                                    <li class="pagination__menu--items pagination__arrow d-flex">
                                        <a href="#" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.583 20.5832L0.999675 10.9998L10.583 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="visually-hidden">page left arrow</span>
                                        </a>
                                        <span class="pagination__arrow-icon">
                                            <svg width="3" height="22" viewBox="0 0 3 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.50098 1L1.50098 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        <a href="#" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.001 20.5832L1.41764 10.9998L11.001 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="visually-hidden">page left arrow</span>
                                        </a>
                                    </li>
                                    <li class="pagination__menu--items"><a href="#" class="pagination__menu--link">01</a></li>
                                    <li class="pagination__menu--items"><a href="#" class="pagination__menu--link active color-accent-1">02</a></li>
                                    <li class="pagination__menu--items"><a href="#" class="pagination__menu--link">03</a></li>
                                    <li class="pagination__menu--items pagination__arrow d-flex">
                                        <a href="#" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.00098 20.5832L10.5843 10.9998L1.00098 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="visually-hidden">page right arrow</span>
                                        </a>
                                        <span class="pagination__arrow-icon">
                                            <svg width="3" height="22" viewBox="0 0 3 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.50098 1L1.50098 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        <a href="#" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.41895 20.5832L11.0023 10.9998L1.41895 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="visually-hidden">page right arrow</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- dashboard container .\ -->

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




