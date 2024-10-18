<?php
include 'inc/header2.php';
include_once 'functions/dbconn.php';
include_once 'functions/Properties.php';

$database = new Database();
$db = $database->getConnection();

$property = new Property($db);
$properties = $property->getRecentProperties(3);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $propertyDetails = $property->getPropertyById($id);
    if (!$propertyDetails) {
        // Handle the case where the property is not found
        echo "Property not found";
        exit;
    }
} else {
    // Handle the case where no ID is provided
    echo "No property specified";
    exit;
}
?>

<main class="main__content_wrapper">

    <!-- Hero section -->
    <section class="listing__hero--section">
        <div class="listing__hero--section__inner position-relative">
            <div class="listing__hero--slider">
                <div class="swiper hero__swiper--column1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class=" listing__hero--slider__items position-relative">
                                <img class="listing__hero--slider__media w-100" style=" object-fit: cover; object-position:center;" src="functions/<?php echo $propertyDetails['image']?>" alt="img">
                                <div class="listing__hero--slider__container">
                                    <div class="container">
                                        <!-- Hero Content -->
                                        <div class="listing__hero--slider__content">
                                            <div class="listing__hero--slider__content--top d-flex align-items-center justify-content-between">
                                                <h3 class="listing__hero--slider__title"><?php echo htmlspecialchars($propertyDetails['name']); ?></h3>
                                                <span class="listing__hero--slider__price">&#8358;<?php echo htmlspecialchars($propertyDetails['price']); ?></span>
                                            </div>
                                            <p class="listing__hero--slider__text">
                                                <?php if ($propertyDetails['category'] === 'Buildings' || $propertyDetails['category'] === 'Lands'): ?>
                                                    <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#FA4B4A" />
                                                    </svg>
                                                    <?php echo htmlspecialchars($propertyDetails['address']); ?>
                                                <?php elseif ($propertyDetails['category'] === 'Cars'): ?>
                                                    <?php echo htmlspecialchars($propertyDetails['brand']); ?>
                                                <?php endif; ?>

                                            </p>
                                        </div>
                                        <!-- Hero Content .\ -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Hero section .\ -->

    <!-- Listing details section -->
    <section class="listing__details--section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing__details--wrapper">
                        <div class="listing__details--content">
                            <div class="listing__details--content__top mb-25 d-flex align-items-center justify-content-between">
                                <div class="listing__details--meta">
                                    <ul class="listing__details--meta__wrapper d-flex align-items-center">
                                        <li><span class="listing__details--badge">Featured</span></li>
                                        <li><span class="listing__details--badge two">For sale</span></li>
                                </div>

                            </div>
                            <div class="listing__details--content__step">
                                <h2 class="listing__details--title mb-25"><?php echo htmlspecialchars($propertyDetails['name']); ?></h2>
                                <div class="listing__details--price__id d-flex align-items-center">
                                    <div class="listing__details--price d-flex">
                                        <span class="listing__details--price__new">$<?php echo htmlspecialchars($propertyDetails['price']); ?></span>
                                        <!-- <span class="listing__details--price__old">$16000</span> -->
                                    </div>
                                </div>
                                <p class="listing__details--location__text"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#FA4B4A" />
                                    </svg>
                                    <?php echo htmlspecialchars($propertyDetails['address']); ?></p>
                            </div>
                        </div>
                        <div class="listing__details--main__content">
                            <div class="listing__details--content__step mb-80">
                                <h3 class="listing__details--content__title">Description:</h3>
                                <p class="listing__details--content__desc"><?php echo htmlspecialchars($propertyDetails['description']); ?></p>
                                <?php if ($propertyDetails['category'] === 'Buildings'): ?>
                                    <div class="apartment__info listing__d--info">
                                        <div class="apartment__info--wrapper d-flex">
                                            <div class="apartment__info--list">
                                                <span class="apartment__info--icon"><img src="assets/img/icon/bed-realistic.png" alt="img"></span>
                                                <p>
                                                    <span class="apartment__info--count"><?php echo htmlspecialchars($propertyDetails['rooms']); ?></span>
                                                    <span class="apartment__info--title">Bedrooms</span>
                                                </p>
                                            </div>
                                            <div class="apartment__info--list">
                                                <span class="apartment__info--icon"><img src="assets/img/icon/properties-icon3.png" alt="img"></span>
                                                <p>
                                                    <span class="apartment__info--count"><?php echo htmlspecialchars($propertyDetails['washrooms']); ?></span>
                                                    <span class="apartment__info--title"> Bathrooms</span>
                                                </p>
                                            </div>
                                            <div class="apartment__info--list">
                                                <span class="apartment__info--icon"><img src="assets/img/icon/set-square.png" alt="img"></span>
                                                <p>
                                                    <span class="apartment__info--count border-0"><?php echo htmlspecialchars($propertyDetails['area_size']); ?></span>
                                                    <span class="apartment__info--title">Land Sqft</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                            <div class="listing__details--content__step properties__info mb-80">
                                <h3 class="listing__details--content__title mb-40">Properties Details:</h3>
                                <ul class="properties__details--info__wrapper d-flex">
                                    <?php if ($propertyDetails['category'] === 'Buildings' || $propertyDetails['category'] === 'Lands'): ?>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Property ID:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['id']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Price:</span>
                                            <span class="properties__details--info__subtitle">$<?php echo htmlspecialchars($propertyDetails['price']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Land Area Size:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['area_size']); ?> Sq Ft</span>
                                        </li>
                                        <?php if ($propertyDetails['category'] === 'Buildings'): ?>
                                            <li class="properties__details--info__list d-flex justify-content-between">
                                                <span class="properties__details--info__title">Rooms:</span>
                                                <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['rooms']); ?></span>
                                            </li>
                                            <li class="properties__details--info__list d-flex justify-content-between">
                                                <span class="properties__details--info__title">Washroom:</span>
                                                <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['washrooms']); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php elseif ($propertyDetails['category'] === 'Cars'): ?>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Property ID:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['id']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Price:</span>
                                            <span class="properties__details--info__subtitle">$<?php echo htmlspecialchars($propertyDetails['price']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Color:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['color']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Brand:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['brand']); ?></span>
                                        </li>
                                        <li class="properties__details--info__list d-flex justify-content-between">
                                            <span class="properties__details--info__title">Wheeldrive:</span>
                                            <span class="properties__details--info__subtitle"><?php echo htmlspecialchars($propertyDetails['drive']); ?></span>
                                        </li>

                                    <?php endif; ?>
                                </ul>
                            </div>
                            <!-- amenities -->
                            <!-- <div class="listing__details--content__step properties__amenities mb-80">
                                <h3 class="listing__details--content__title mb-40">Properties Amenities</h3>
                                <div class="properties__amenities--wrapper d-flex">
                                    <ul class="properties__amenities--step">
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Air Conditioning</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Microwave</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Central Heating</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Washer</span>
                                        </li>
                                    </ul>
                                    <ul class="properties__amenities--step">
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Laundry</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Outdoor Shower</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Swimming Pool</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Wifi</span>
                                        </li>
                                    </ul>
                                    <ul class="properties__amenities--step">
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Window Covering</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Refrigerator</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Alarm System</span>
                                        </li>
                                        <li class="properties__amenities--list d-flex align-items-center">
                                            <span class="properties__amenities--mark__icon"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.794 2.174C14.426 3.422 13.094 4.874 11.798 6.53C10.67 7.958 9.656 9.422 8.756 10.922C7.94 12.266 7.346 13.418 6.974 14.378C6.962 14.414 6.938 14.444 6.902 14.468C6.866 14.504 6.824 14.522 6.776 14.522C6.764 14.534 6.752 14.54 6.74 14.54C6.656 14.54 6.596 14.516 6.56 14.468L0.134 7.934C0.122 7.922 0.278 7.766 0.602 7.466C0.926 7.154 1.244 6.872 1.556 6.62C1.904 6.332 2.09 6.2 2.114 6.224L5.642 8.996C6.674 7.784 7.832 6.584 9.116 5.396C11.048 3.62 13.04 2.108 15.092 0.86C15.128 0.86 15.266 1.028 15.506 1.364L15.866 1.886C15.878 1.934 15.878 1.988 15.866 2.048C15.854 2.096 15.83 2.138 15.794 2.174Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="properties__amenities--text">Window Coverings</span>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!--location -->
                            <div class="listing__details--content__step mb-80">
                                <!-- <div class="listing__details--location__header d-flex justify-content-between mb-40">
                                    <div class="listing__details--location__header--left">
                                        <h3 class="listing__details--content__title m-0">Location & Google Maps</h3>
                                    </div>
                                    <div class="location__google--maps">
                                        <details>
                                            <summary>Open on Google Maps</summary>
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20227915.86434928!2d1.2189515269861546!3d38.76296158058813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6f73e994d3fb5891%3A0x783ff0a076fdb99!2sCosing%20Connect%20Ltd%2C%20United%20Kingdom!5e0!3m2!1sen!2sbd!4v1699676848803!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </details>
                                    </div>
                                </div> -->
                                <div class="location__google--maps__info d-flex">
                                    <ul class="location__google--maps__info--step">
                                        <li class="location__google--maps__info--list d-flex">
                                            <span class="location__google--maps__info--title">Address:</span>
                                            <span class="location__google--maps__info--subtitle"><?php echo htmlspecialchars($propertyDetails['address']); ?></span>
                                        </li>

                                        <li class="location__google--maps__info--list d-flex">
                                            <span class="location__google--maps__info--title">State: </span>
                                            <span class="location__google--maps__info--subtitle"><?php echo htmlspecialchars($propertyDetails['state']); ?></span>
                                        </li>
                                    </ul>
                                    <ul class="location__google--maps__info--step">
                                        <li class="location__google--maps__info--list d-flex">
                                            <span class="location__google--maps__info--title">Country: </span>
                                            <span class="location__google--maps__info--subtitle">Nigeria</span>
                                        </li>
                                        <li class="location__google--maps__info--list d-flex">
                                            <span class="location__google--maps__info--title">City/Town:</span>
                                            <span class="location__google--maps__info--subtitle"><?php echo htmlspecialchars($propertyDetails['town']); ?></span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing__widget">

                        <!-- massage -->
                        <div class="widget__step mb-30">
                            <h2 class="widget__step--title">Send Messege</h2>
                            <div class="widget__form">
                                <form action="#">
                                    <div class="widget__form--input mb-20">
                                        <input class="widget__form--input__field" placeholder="Full name" type="text">
                                    </div>
                                    <div class="widget__form--input mb-20">
                                        <input class="widget__form--input__field" placeholder="Phone Number" type="text">
                                    </div>
                                    <div class="widget__form--input mb-20">
                                        <input class="widget__form--input__field" placeholder="Email Address" type="email">
                                    </div>
                                    <div class="widget__form--input">
                                        <textarea class="widget__form--textarea__field" placeholder="Write You Messege"></textarea>
                                    </div>
                                    <button class="widget__form--btn solid__btn" type="submit">Send Messege</button>
                                </form>
                            </div>
                        </div>

                        <!-- featured -->
                        <div class="widget__step">
                            <h2 class="widget__step--title">Featured Items</h2>
                            <div class="widget__featured">
                                <?php foreach($properties as $property):?>
                                <div class="widget__featured--items d-flex">
                                    <div class="widget__featured--thumb">
                                        <a class="widget__featured--thumb__link" href="listing-details.php"><img class="widget__featured--media" src="functions/<?php echo $property['image'] ?>" alt="img"></a>
                                    </div>
                                    <div class="widget__featured--content">
                                        <h3 class="widget__featured--title"><a href="listing-details.php"><?php echo $property['name']?></a></h3>
                                        <span class="widget__featured--price">$<?php echo $property['price']?></span>
                                    </div>
                                </div>
                                 <?php endforeach;?>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Listing page section . -->

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

<!-- Mirrored from risingtheme.com/html/demo-newvilla/newvilla/listing-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 11:53:16 GMT -->

</html>