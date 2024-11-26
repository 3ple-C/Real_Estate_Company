<?php
session_start();
if ((!isset($_SESSION['user_role'])) || $_SESSION['user_role'] !== 'admin') {
    $_SESSION['message'] = 'Access denied. You are not authorized to access this page';
    $_SESSION['message-type'] = 'danger';
    header('Location:../index.php');
}

include_once '../functions/dbconn.php';
include_once '../functions/Category.php';
include_once '../functions/Properties.php';

$database = new Database();
$db = $database->getConnection();

// Get property details
$property = new Property($db);

// Get the property ID from URL
$property_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$property_id) {
    $_SESSION['message'] = 'No property specified for editing';
    $_SESSION['message-type'] = 'danger';
    header('Location: property-listings.php');
    exit();
}

// THEN get the property details using the ID
$property_details = $property->getPropertyById($property_id);

if (!$property_details) {
    $_SESSION['message'] = 'Property not found';
    $_SESSION['message-type'] = 'danger';
    header('Location: property-listings.php');
    exit();
}

// Get categories for dropdown
$category = new Category($db);
$categories = $category->getAllCategories();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Property - Royal Haven Homes</title>
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
    <link rel="stylesheet" href="assets/css/creat-listing.css">
    <link rel="stylesheet" href="assets/css/dark.css">

    <script>
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
                        <h2 class="add__property--heading__title">Edit Property</h2>
                        <p class="add__property--desc">Update property information</p>
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
                    <form method="POST" action="../functions/update_property.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $property_details['id']; ?>">

                        <div class="add__property--step">
                            <div class="add__property--step__inner">
                                <div class="add__property--box mb-30 p-5">
                                    <h3 class="add__property--box__title mb-20">Update Listing</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="input1">Name</label>
                                                <input class="add__listing--input__field" id="input1" value="<?php echo htmlspecialchars($property_details['name']); ?>" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="add__listing--textarea__box mb-15">
                                                <label class="add__listing--input__label" for="input2">Description</label>
                                                <input class="add__listing--textarea__field" type="text" id="input2" value="<?php echo htmlspecialchars($property_details['description']); ?>" name="description" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label">Property Category</label>
                                                <div class="select position-relative">
                                                    <select class="add__listing--form__select" name="category_id">
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['id']; ?>" <?php echo ($category['name'] === $property_details['category']) ? 'selected' : ''; ?>>
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
                                                <input class="add__listing--input__field" id="price" value="<?php echo htmlspecialchars($property_details['price']); ?>" type="text" name="price">
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
                                                <input class="add__listing--input__field" id="address" value="<?php echo htmlspecialchars($property_details['address']); ?>" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="add__listing--textarea__box mb-15">
                                                <label class="add__listing--input__label" for="input6">State</label>
                                                <input class="add__listing--input__field" id="input6" value="<?php echo htmlspecialchars($property_details['state']); ?>" name="state" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add__listing--input__box mb-20">
                                                <label class="add__listing--input__label" for="town">City</label>
                                                <div class="position-relative">
                                                    <input class="add__listing--input__field" id="town" value="<?php echo htmlspecialchars($property_details['town']); ?>" type="text" name="town" />
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
                                            <input class="add__listing--input__field" id="area_size" value="<?php echo htmlspecialchars($property_details['area_size']); ?>" type="text" name="area_size">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="rooms">Bedrooms</label>
                                            <input class="add__listing--input__field" id="rooms" value="<?php echo htmlspecialchars($property_details['rooms']); ?>" type="text" name="rooms">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="washrooms">Bathrooms</label>
                                            <input class="add__listing--input__field" id="washrooms" value="<?php echo htmlspecialchars($property_details['washrooms']); ?>" type="text" name="washrooms">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="color">Color</label>
                                            <input class="add__listing--input__field" id="color" value="<?php echo htmlspecialchars($property_details['color']); ?>" type="text" name="color">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="brand">Brand</label>
                                            <input class="add__listing--input__field" id="brand" value="<?php echo htmlspecialchars($property_details['brand']); ?>" type="text" name="brand">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="add__listing--input__box mb-20">
                                            <label class="add__listing--input__label" for="drive">Wheel Drive</label>
                                            <input class="add__listing--input__field" id="drive" value="<?php echo htmlspecialchars($property_details['drive']); ?>" type="text" name="drive">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add__property--box mb-30 p-4">
                                <h3 class="add__property--box__title mb-20">Property media</h3>
                                <div class="col-property__media--wrapper d-flex justify-content-between">
                                    <div class="browse__file--area position-relative">
                                        <input class="" name="image" type="file" step="0.01" id="image">
                                        <?php if (!empty($property_details['image'])): ?>
                                            <div class="mt-2">
                                                <p>Current image: <?php echo htmlspecialchars($property_details['image']); ?></p>
                                                <img src="<?php echo htmlspecialchars($property_details['image']); ?>" alt="Current property image" style="max-width: 200px;">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input class="solid__btn add__property--btn" type="submit" value="Update Property" />
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
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.getElementById("light__to--dark")?.classList.add("dark--version");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.getElementById("light__to--dark")?.classList.remove("dark--version");
        }
    </script>
</body>

</html>