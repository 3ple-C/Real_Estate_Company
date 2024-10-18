<?php
session_start();

include_once '../functions/dbconn.php';
include_once '../functions/Category.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);
$categories = $category->getAllCategories();
?>

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
                        <h2 class="add__property--heading__title">Add New Property</h2>
                        <p class="add__property--desc">We are glad to see you again!</p>
                    </div>
                    <?php if (isset($_SESSION['messages'])): ?>
                        <div class="alert alert-<?= $_SESSION['message-type'] ?>">
                            <p><?php
                                echo $_SESSION['messages'];
                                unset($_SESSION['messages']);
                                unset($_SESSION['message-type']);
                                ?></p>
                        </div>
                    <?php endif; ?>
                    <form action="../functions/add_properties.php" method="post" enctype="multipart/form-data">

                        <div class="add__property--step ">
                            <div class="add__property--step__inner">
                                <div class="add__property--box mb-30 p-5">
                                    <h3 class="add__property--box__title mb-20">Create Listing</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="input1">Name</label>
                                                <input class="add__listing--input__field" id="input1" placeholder="Property Name" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="add__listing--textarea__box mb-15">
                                                <label class="add__listing--input__label" for="input2">Description</label>
                                                <input class="add__listing--textarea__field" type="text" id="input2" placeholder="Description" name="description" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label">Property Category</label>
                                                <div class="select position-relative">
                                                    <select class="add__listing--form__select" name="category_id">
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['id'] ?>">
                                                                <?php echo $category['name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="price">Price</label>
                                                <input class="add__listing--input__field" id="price" placeholder="Price" type="text" name="price">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add__property--box mb-30 p-5">
                                    <h3 class="add__property--box__title mb-20">Location</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="address">Address</label>
                                                <input class="add__listing--input__field" id="address" placeholder="Address" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="add__listing--textarea__box mb-15">
                                                <label class="add__listing--input__label" for="input6">State</label>
                                                <input class="add__listing--input__field" id="input6" placeholder="State" name="state" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="town"> City</label>
                                                <div class=" position-relative">
                                                    <input class="add__listing--input__field" id="town" placeholder="City / Town" type="text" name="town" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add__property--step">
                            <div class="add__property--box mb-30 p-5">
                                <h3 class="add__property--box__title mb-20">Detailed Information</h3>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="area_size">Area Size</label>
                                            <input class="add__listing--input__field" id="area_size" placeholder="Area Size" type="text" name="area_size">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="rooms">Bedrooms</label>
                                            <input class="add__listing--input__field" id="rooms" placeholder="Bedrooms" type="text" name="rooms">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="washrooms">Bathrooms</label>
                                            <input class="add__listing--input__field" id="washrooms" placeholder="Bathrooms" type="text" name="washrooms">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="color">Color</label>
                                            <input class="add__listing--input__field" id="color" placeholder="Car Color" type="text" name="color">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="brand">Brand</label>
                                            <input class="add__listing--input__field" id="brand" placeholder="Car Brand" type="text" name="brand">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="drive">Wheel Drive</label>
                                            <input class="add__listing--input__field" id="drive" placeholder="Car Wheel Drive" type="text" name="drive">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add__property--box mb-30 p-4">
                                <h3 class="add__property--box__title mb-20">Property media</h3>
                                <div class="col-property__media--wrapper d-flex justify-content-between">
                                    <div class="browse__file--area position-relative">
                                        <!-- <button class="browse__file--btn">Choose File</button> -->
                                        <input class="" name="image" type="file" step="0.01" id="image" required>
                                    </div>
                                    <!-- <div class="browse__file--area position-relative">
                                        <button class="browse__file--btn">Select Attachment</button>
                                        <input class="browse__file--input__field" type="file">
                                    </div> -->
                                </div>
                            </div>

                        </div>


                        <input class="solid__btn add__property--btn" type="submit" id="submit" value="Add Property" />
                    </form>
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

<!-- Mirrored from risingtheme.com/html/demo-newvilla/newvilla/admin/create-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 11:53:38 GMT -->

</html>