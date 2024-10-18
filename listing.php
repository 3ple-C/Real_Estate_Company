<?php
include 'inc/header2.php';

include_once 'functions/dbconn.php';
include_once 'functions/Properties.php';

$database = new Database();
$db = $database->getConnection();

$property = new Property($db);
$properties = $property->getAllProperties();
$propertiesDetails = $property->getRecentProperties(3);
?>
<main class="main__content_wrapper">

    <!-- Breadcrumb section -->
    <section class="breadcrumb__section section--padding">
        <div class="container">
            <div class="breadcrumb__content text-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <h1 class="breadcrumb__title h2"><span>Listing</span> Page</h1>
                <ul class="breadcrumb__menu d-flex justify-content-center">
                    <li class="breadcrumb__menu--items"><a class="breadcrumb__menu--link" href="index.php">Home</a></li>
                    <li><span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.22321 4.65179C5.28274 4.71131 5.3125 4.77976 5.3125 4.85714C5.3125 4.93452 5.28274 5.00298 5.22321 5.0625L1.0625 9.22321C1.00298 9.28274 0.934524 9.3125 0.857143 9.3125C0.779762 9.3125 0.71131 9.28274 0.651786 9.22321L0.205357 8.77679C0.145833 8.71726 0.116071 8.64881 0.116071 8.57143C0.116071 8.49405 0.145833 8.4256 0.205357 8.36607L3.71429 4.85714L0.205357 1.34821C0.145833 1.28869 0.116071 1.22024 0.116071 1.14286C0.116071 1.06548 0.145833 0.997023 0.205357 0.9375L0.651786 0.491071C0.71131 0.431547 0.779762 0.401785 0.857143 0.401785C0.934524 0.401785 1.00298 0.431547 1.0625 0.491071L5.22321 4.65179Z" fill="#706C6C" />
                            </svg>
                        </span></li>
                    <li><span class="breadcrumb__menu--text">Listing Page </span></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section .\ -->

    <!-- Listing page section -->
    <section class="listing__page--section section--padding">
        <div class="container">
            <div class="row column-reverse-md">
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="listing__widget">
                        <div class="widget__search mb-30" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            <div class="widget__search--input position-relative">
                                <input class="widget__search--input__field" placeholder="Search product" type="text">
                                <button class="widget__search--btn"><svg width="16" height="17" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.10714 9.54464C9.89286 8.75893 10.2857 7.81548 10.2857 6.71429C10.2857 5.61309 9.89286 4.67262 9.10714 3.89286C8.32738 3.10714 7.38691 2.71428 6.28571 2.71428C5.18452 2.71428 4.24107 3.10714 3.45536 3.89286C2.6756 4.67262 2.28571 5.61309 2.28571 6.71429C2.28571 7.81548 2.6756 8.75893 3.45536 9.54464C4.24107 10.3244 5.18452 10.7143 6.28571 10.7143C7.38691 10.7143 8.32738 10.3244 9.10714 9.54464ZM14.8571 14.1429C14.8571 14.4524 14.744 14.7202 14.5179 14.9464C14.2917 15.1726 14.0238 15.2857 13.7143 15.2857C13.3929 15.2857 13.125 15.1726 12.9107 14.9464L9.84822 11.8929C8.78274 12.631 7.59524 13 6.28571 13C5.43452 13 4.61905 12.8363 3.83929 12.5089C3.06548 12.1756 2.39583 11.7292 1.83036 11.1696C1.27083 10.6042 0.824405 9.93452 0.491071 9.16071C0.16369 8.38095 0 7.56548 0 6.71429C0 5.86309 0.16369 5.05059 0.491071 4.27678C0.824405 3.49702 1.27083 2.82738 1.83036 2.26786C2.39583 1.70238 3.06548 1.25595 3.83929 0.928571C4.61905 0.595237 5.43452 0.428571 6.28571 0.428571C7.13691 0.428571 7.94941 0.595237 8.72322 0.928571C9.50298 1.25595 10.1726 1.70238 10.7321 2.26786C11.2976 2.82738 11.744 3.49702 12.0714 4.27678C12.4048 5.05059 12.5714 5.86309 12.5714 6.71429C12.5714 8.02381 12.2024 9.21131 11.4643 10.2768L14.5268 13.3393C14.747 13.5595 14.8571 13.8274 14.8571 14.1429Z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="listing__widget--inner" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                            <!-- Highligthed location -->
                            <div class="widget__list mb-40">
                                <div class="widget__thumbnail">
                                    <a class="widget__thumbnail--link" href="listing-details.php"><img class="widget__thumbnail--media" src="assets/img/other/sidebar-widget-thumb.png" alt="img">

                                        <div class="widget__thumbnail--text">
                                            <h3 class="widget__thumbnail--title">Amanuke</h3>
                                            <span class="widget__thumbnail--subtitle">10k Plots of Land<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.62805L17.3926 13.9757C17.3918 14.3282 17.2595 14.6594 17.0207 14.9093C16.7816 15.1594 16.4657 15.2964 16.1306 15.2957L15.0639 15.2927C14.729 15.292 14.4135 15.1531 14.1757 14.9019C13.938 14.6508 13.8 14.3105 13.801 13.9585L13.8106 6.74716L2.89752 18.1612C2.40548 18.6758 1.63343 18.6776 1.14372 18.1602L0.391553 17.3656C-0.0981567 16.8482 -0.131297 15.9959 0.360739 15.4813L11.3128 4.02645L4.39453 4.02088C4.05935 4.01986 3.74986 3.88742 3.51206 3.6362C3.27453 3.38526 3.14693 3.05595 3.14777 2.70376L3.15202 1.58437C3.15286 1.2319 3.28561 0.901459 3.52473 0.651356C3.76359 0.401531 4.07993 0.264768 4.41525 0.26565L16.1618 0.296578C16.4981 0.297602 16.8147 0.437285 17.0521 0.689475C17.2914 0.941255 17.423 1.27475 17.4219 1.62805Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Serach by location -->
                            <!-- <div class="widget__list mb-40">
                                <h2 class="widget__title mb-30">Find By Location</h2>
                                <ul class="widget__location">
                                    <li class="widget__location--list">
                                        <label class="widget__location--label" for="check8">Australia</label>
                                        <input class="widget__catagories--input" id="check8" type="checkbox">
                                        <span class="widget__catagories--checkmark"></span>
                                    </li>
                                    <li class="widget__location--list">
                                        <label class="widget__location--label" for="check9">Swezarland </label>
                                        <input class="widget__catagories--input" id="check9" type="checkbox">
                                        <span class="widget__catagories--checkmark"></span>
                                    </li>
                                    <li class="widget__location--list">
                                        <label class="widget__location--label" for="check10">India </label>
                                        <input class="widget__catagories--input" id="check10" type="checkbox">
                                        <span class="widget__catagories--checkmark"></span>
                                    </li>
                                    <li class="widget__location--list">
                                        <label class="widget__location--label" for="check11">California</label>
                                        <input class="widget__catagories--input" id="check11" type="checkbox">
                                        <span class="widget__catagories--checkmark"></span>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="widget__list">
                                <h2 class="widget__title mb-30">Featured Items</h2>
                                <?php foreach ($propertiesDetails as $property): ?>
                                    <div class="widget__featured">
                                        <div class="widget__featured--items d-flex">
                                            <div class="widget__featured--thumb">
                                                <a class="widget__featured--thumb__link" href="listing-details.php"><img class="widget__featured--media" src="functions/<?php echo $property['image'] ?>" alt="img"></a>
                                            </div>
                                            <div class="widget__featured--content">
                                                <h3 class="widget__featured--title"><a href="listing-details.php"><?php echo $property['name'] ?></a></h3>
                                                <span class="widget__featured--price"><?php echo $property['price'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Listings -->
                <div class="col-lg-8">
                    <div class="listing__page--wrapper">
                        <!-- <div class="listing__header d-flex justify-content-between align-items-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">
                            <div class="listing__header--left">
                                <p class="results__cout--text">Showing 12 of 21 Results</p>
                            </div>
                            <div class="listing__header--right d-flex align-items-center">
                                <div class="recently__select d-flex align-items-center">
                                    <span class="recently__select--icon"><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.42426 9.76048L10.1339 12.6088C10.3985 12.8869 10.8273 12.8869 11.0919 12.6088L13.8016 9.76048C14.0661 9.48239 14.0661 9.03159 13.8016 8.7535C13.537 8.47541 13.1082 8.47541 12.8436 8.7535L11.2903 10.3862V0.712076C11.2903 0.318811 10.987 0 10.6129 0C10.2388 0 9.9355 0.318811 9.9355 0.712076V10.3862L8.38222 8.7535C8.11766 8.47541 7.68881 8.47541 7.42426 8.7535C7.1597 9.03159 7.1597 9.48239 7.42426 9.76048ZM3.86611 0.208562C3.60156 -0.0695178 3.17264 -0.0695178 2.90809 0.208562L0.19841 3.05687C-0.0661366 3.33495 -0.0661366 3.78581 0.19841 4.06389C0.462956 4.34197 0.891881 4.34197 1.15643 4.06389L2.70968 2.43118V12.1053C2.70968 12.4985 3.01297 12.8174 3.3871 12.8174C3.76123 12.8174 4.06452 12.4985 4.06452 12.1053V2.43118L5.6178 4.06389C5.88236 4.34197 6.31121 4.34197 6.57576 4.06389C6.84032 3.78581 6.84032 3.33495 6.57576 3.05687L3.86611 0.208562Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="select">
                                        <select>
                                            <option selected value="1">Recently Added</option>
                                            <option value="2">Newest</option>
                                            <option value="3">Best Seller</option>
                                            <option value="4">Best Match</option>
                                            <option value="5">Price Low</option>
                                            <option value="6">Price High</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="nav listing__tab--btn">
                                    <li class="nav-item listing__tab--btn__list">
                                        <button class="listing__tab--btn__field " data-bs-toggle="tab" data-bs-target="#list" type="button"> <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_393_19356)">
                                                    <path d="M19.9528 18.125H5.91016C5.33139 18.125 4.8623 17.6559 4.8623 17.0771C4.8623 16.4984 5.33139 16.0293 5.91016 16.0293H19.9524C20.5312 16.0293 21.0003 16.4984 21.0003 17.0771C21.0003 17.6559 20.5315 18.125 19.9528 18.125Z" fill="currentColor" />
                                                    <path d="M19.9528 11.5479H5.91016C5.33139 11.5479 4.8623 11.0788 4.8623 10.5C4.8623 9.92124 5.33139 9.45215 5.91016 9.45215H19.9524C20.5312 9.45215 21.0003 9.92124 21.0003 10.5C21.0006 11.0788 20.5315 11.5479 19.9528 11.5479Z" fill="currentColor" />
                                                    <path d="M19.9528 4.9707H5.91016C5.33139 4.9707 4.8623 4.50162 4.8623 3.92285C4.8623 3.34409 5.33139 2.875 5.91016 2.875H19.9524C20.5312 2.875 21.0003 3.34409 21.0003 3.92285C21.0003 4.50162 20.5315 4.9707 19.9528 4.9707Z" fill="currentColor" />
                                                    <path d="M1.40726 5.41121C2.18448 5.41121 2.81453 4.78116 2.81453 4.00394C2.81453 3.22673 2.18448 2.59668 1.40726 2.59668C0.630054 2.59668 0 3.22673 0 4.00394C0 4.78116 0.630054 5.41121 1.40726 5.41121Z" fill="currentColor" />
                                                    <path d="M1.40726 11.9073C2.18448 11.9073 2.81453 11.2772 2.81453 10.5C2.81453 9.72283 2.18448 9.09277 1.40726 9.09277C0.630054 9.09277 0 9.72283 0 10.5C0 11.2772 0.630054 11.9073 1.40726 11.9073Z" fill="currentColor" />
                                                    <path d="M1.40726 18.4034C2.18448 18.4034 2.81453 17.7733 2.81453 16.9961C2.81453 16.2189 2.18448 15.5889 1.40726 15.5889C0.630054 15.5889 0 16.2189 0 16.9961C0 17.7733 0.630054 18.4034 1.40726 18.4034Z" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_393_19356">
                                                        <rect width="21" height="21" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </li>
                                    <li class="nav-item listing__tab--btn__list">
                                        <button class="listing__tab--btn__field active" data-bs-toggle="tab" data-bs-target="#grid" type="button">
                                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.15776 0H2.06224C0.925133 0 0 0.972462 0 2.16775V6.47278C0 7.66806 0.925133 8.64052 2.06224 8.64052H6.15776C7.29487 8.64052 8.22 7.66806 8.22 6.47278V2.16775C8.22 0.972462 7.29487 0 6.15776 0ZM6.82678 6.47278C6.82678 6.86054 6.52665 7.17603 6.15776 7.17603H2.06224C1.69335 7.17603 1.39322 6.86054 1.39322 6.47278V2.16775C1.39322 1.77998 1.69335 1.4645 2.06224 1.4645H6.15776C6.52665 1.4645 6.82678 1.77998 6.82678 2.16775V6.47278Z" fill="currentColor" />
                                                <path d="M16.9114 0H12.8711C11.7187 0 10.7812 0.985459 10.7812 2.19674V6.44378C10.7812 7.65506 11.7187 8.64052 12.8711 8.64052H16.9114C18.0638 8.64052 19.0013 7.65506 19.0013 6.44378V2.19674C19.0013 0.985459 18.0638 0 16.9114 0ZM17.608 6.44378C17.608 6.84754 17.2955 7.17603 16.9114 7.17603H12.8711C12.487 7.17603 12.1745 6.84754 12.1745 6.44378V2.19674C12.1745 1.79298 12.487 1.4645 12.8711 1.4645H16.9114C17.2955 1.4645 17.608 1.79298 17.608 2.19674V6.44378Z" fill="currentColor" />
                                                <path d="M6.15776 11.333H2.06224C0.925133 11.333 0 12.3055 0 13.5008V17.8058C0 19.0011 0.925133 19.9735 2.06224 19.9735H6.15776C7.29487 19.9735 8.22 19.0011 8.22 17.8058V13.5008C8.22 12.3055 7.29487 11.333 6.15776 11.333ZM6.82678 17.8058C6.82678 18.1935 6.52665 18.509 6.15776 18.509H2.06224C1.69335 18.509 1.39322 18.1935 1.39322 17.8058V13.5008C1.39322 13.113 1.69335 12.7975 2.06224 12.7975H6.15776C6.52665 12.7975 6.82678 13.113 6.82678 13.5008V17.8058Z" fill="currentColor" />
                                                <path d="M16.9114 11.333H12.8711C11.7187 11.333 10.7812 12.3185 10.7812 13.5298V17.7768C10.7812 18.9881 11.7187 19.9735 12.8711 19.9735H16.9114C18.0638 19.9735 19.0013 18.9881 19.0013 17.7768V13.5298C19.0013 12.3185 18.0638 11.333 16.9114 11.333ZM17.608 17.7768C17.608 18.1805 17.2955 18.509 16.9114 18.509H12.8711C12.487 18.509 12.1745 18.1805 12.1745 17.7768V13.5298C12.1745 13.126 12.487 12.7975 12.8711 12.7975H16.9114C17.2955 12.7975 17.608 13.126 17.608 13.5298V17.7768Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="listing__main--content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="list">
                                    <div class="listing__featured--list">
                                        <?php foreach ($properties as $property): ?>
                                            <?php if ($property['category'] === 'Lands'): ?>
                                                <article class="featured__card--list d-flex align-items-center mb-30">
                                                    <div class="listing__featured--thumbnail position-relative">
                                                        <div class="media">
                                                            <a class="featured__thumbnail--link" href="listing-details.php">
                                                                <img class="featured__thumbnail--img" src="functions/<?php echo $property['image'] ?>" alt="featured-img">
                                                            </a>
                                                        </div>
                                                        <div class="featured__badge">
                                                            <span class="badge__field style2">For sale</span>
                                                        </div>
                                                        <!-- <span class="featured__author--img__style2">
                                                            <img src="assets/img/property/properties-author.png" alt="img">
                                                        </span> -->
                                                    </div>
                                                    <div class="listing__featured--content">
                                                        <div class="featured__content--list__top d-flex justify-content-between">
                                                            <h3 class="featured__card--title"><a href="listing-details.php"><?php echo $property['name'] ?></a></h3>

                                                        </div>
                                                        <span class="featured__card--price"><?php echo $property['price'] ?></span>
                                                        <ul class="listing__featured--info d-flex">
                                                            <li class="listing__featured--info__items">
                                                                <span class="listing__featured--info__icon">

                                                                </span>
                                                                <span class="listing__featured--info__text"><?php echo $property['state'] ?></span>
                                                            </li>
                                                            <li class="listing__featured--info__items">
                                                                <span class="listing__featured--info__icon">

                                                                </span>
                                                                <span class="listing__featured--info__text"><?php echo $property['town'] ?></span>
                                                            </li>
                                                        </ul>
                                                        <div class="featured__content--list__footer d-flex justify-content-between">
                                                            <p class="featured__content--desc listing__style m-0"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#F23B3B" />
                                                                </svg>
                                                                <?php echo $property['address'] ?></p>
                                                            <a class="listing__details--btn" href="listing-details.php?id=<?php echo $property['id'] ?>"> Details</a>
                                                        </div>

                                                    </div>
                                                </article>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="page__pagination--area">
                                <ul class="page__pagination--wrapper d-flex justify-content-center">
                                    <li class="page__pagination--list"><a class="page__pagination--link" href="#"><svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 5.12695C5.73633 5.39062 5.73633 5.83008 6 6.12305L9.98438 10.1074C10.2773 10.3711 10.7168 10.3711 10.9805 10.1074L11.6543 9.43359C11.918 9.14062 11.918 8.70117 11.6543 8.4375L8.8125 5.5957L11.6543 2.7832C11.918 2.51953 11.918 2.08008 11.6543 1.78711L10.9805 1.14258C10.7168 0.849609 10.2773 0.849609 9.98437 1.14258L6 5.12695ZM0.375 6.12305L4.35938 10.1074C4.65234 10.3711 5.0918 10.3711 5.35547 10.1074L6.0293 9.43359C6.29297 9.16992 6.29297 8.70117 6.0293 8.4375L3.1875 5.625L6.0293 2.7832C6.29297 2.51953 6.29297 2.08008 6.0293 1.78711L5.35547 1.14258C5.0918 0.849609 4.62305 0.849609 4.35937 1.14258L0.375 5.12695C0.111328 5.39063 0.111328 5.83008 0.375 6.12305Z" fill="currentColor" />
                                            </svg>
                                        </a></li>
                                    <li class="page__pagination--list"><a class="page__pagination--link" href="#">1
                                        </a></li>
                                    <li class="page__pagination--list"><a class="page__pagination--link active" href="#">2
                                        </a></li>
                                    <li class="page__pagination--list"><a class="page__pagination--link" href="#">3
                                        </a></li>
                                    <li class="page__pagination--list"><a class="page__pagination--link" href="#"><svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 5.87305C6.26367 5.60938 6.26367 5.16992 6 4.87695L2.01562 0.892578C1.72266 0.628906 1.2832 0.628906 1.01953 0.892578L0.345703 1.56641C0.0820312 1.85938 0.0820312 2.29883 0.345703 2.5625L3.1875 5.4043L0.345703 8.2168C0.0820312 8.48047 0.0820312 8.91992 0.345703 9.21289L1.01953 9.85742C1.2832 10.1504 1.72266 10.1504 2.01562 9.85742L6 5.87305ZM11.625 4.87695L7.64062 0.892578C7.34766 0.628906 6.9082 0.628906 6.64453 0.892578L5.9707 1.56641C5.70703 1.83008 5.70703 2.29883 5.9707 2.5625L8.8125 5.375L5.9707 8.2168C5.70703 8.48047 5.70703 8.91992 5.9707 9.21289L6.64453 9.85742C6.9082 10.1504 7.37695 10.1504 7.64062 9.85742L11.625 5.87305C11.8887 5.60938 11.8887 5.16992 11.625 4.87695Z" fill="currentColor" />
                                            </svg>
                                        </a></li>
                                </ul>
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

</html>