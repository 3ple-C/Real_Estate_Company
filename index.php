<?php
include 'inc/header.php';

include_once 'functions/dbconn.php';
include_once 'functions/Properties.php';

$database = new Database();
$db = $database->getConnection();

$property = new Property($db);
$properties = $property->getAllProperties();


?>
<main class="main__content_wrapper">
    <!-- Start Hero section -->
    <div class="hero__section hero__section--bg">
        <div class="container-fluid">
            <div class="hero__section--inner">
                <div class="hero__section--wrapper">
                    <div class="hero__content text-center">
                        <p class="hero__content--desc" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">Providing <span class="color-hover">exceptional</span> homes and lands that cater to a variety of lifestyles</p>
                        <h2 class="hero__content--title h1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">First Class and <span class="color-hover"> Premium</span> <br> Real Estate Property</h2>
                    </div>
                    <!-- Advance search filter -->
                    <!-- <div class="advance__search--filter">
                            <ul class="nav advance__tab--btn justify-content-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                                <li class="nav-item advance__tab--btn__list">
                                    <button class="advance__tab--btn__field active" data-bs-toggle="tab" data-bs-target="#buy" type="button"> Buy
                                    </button>
                                </li>
                                <li class="nav-item advance__tab--btn__list">
                                    <button class="advance__tab--btn__field" data-bs-toggle="tab" data-bs-target="#rent" type="button">
                                        Rent</button>
                                </li>
                            </ul>
                            <div class="tab-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <div class="tab-pane fade show active" id="buy">
                                    <div class="advance__search--inner d-flex">
                                        <div class="advance__search--items">
                                            <input class="advance__search--input" placeholder="Enter Keyword..." type="text">
                                        </div>
                                        <div class="advance__search--items">
                                            <select class="advance__search--select">
                                                <option selected value="1">Property Type</option>
                                                <option value="2">Bungalow</option>
                                                <option value="3">Condo</option>
                                                <option value="4">Apartment</option>
                                                <option value="5">House</option>
                                                <option value="6">Single Family</option>
                                                <option value="7">Land</option>
                                            </select>
                                        </div>
                                        <div class="advance__search--items position-relative">
                                            <input class="advance__search--input" placeholder="Which Place?" type="text">
                                            <span class="advance__location--icon"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#8B8B8B" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="advance__search--items price">
                                            <div class="advance__search--price d-flex align-items-center justify-content-between">
                                                <span>Price</span>
                                                <label><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.34376 8.4373H5.06244V3.37489H8.43733C8.74808 3.37489 8.99977 3.1228 8.99977 2.81245C8.99977 2.50189 8.74807 2.25001 8.43733 2.25001H5.06244V0.56244C5.06244 0.251885 4.81074 0 4.5 0C4.18926 0 3.93756 0.252091 3.93756 0.56244V2.25001H3.65623C1.64026 2.25001 0 3.89027 0 5.90624C0 7.92222 1.64026 9.56248 3.65623 9.56248H3.93756V14.6249L0.562671 14.6247C0.251921 14.6247 0.000231432 14.8768 0.000231432 15.1871C0.000231432 15.4977 0.251931 15.7496 0.562671 15.7496H3.93756V17.4371C3.93756 17.7477 4.18926 17.9996 4.5 17.9996C4.81074 17.9996 5.06244 17.7475 5.06244 17.4371V15.7496H5.34376C7.35974 15.7496 9 14.1093 9 12.0933C9 10.0776 7.35974 8.4373 5.34376 8.4373V8.4373ZM3.93754 8.4373H3.65621C2.26039 8.4373 1.12511 7.30202 1.12511 5.90619C1.12511 4.51037 2.26039 3.37509 3.65621 3.37509H3.93754V8.4373ZM5.34376 14.6247H5.06244V9.56228H5.34376C6.73959 9.56228 7.87487 10.6976 7.87487 12.0934C7.87487 13.4894 6.73959 14.6247 5.34376 14.6247Z" fill="#8B8B8B" />
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="advance__search--btn solid__btn">Search Now <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.60519 0C2.96319 0 0 2.96338 0 6.60562C0 10.2481 2.96319 13.2112 6.60519 13.2112C10.2474 13.2112 13.2104 10.2481 13.2104 6.60562C13.2104 2.96338 10.2474 0 6.60519 0ZM6.60519 11.9918C3.6355 11.9918 1.21942 9.57553 1.21942 6.60565C1.21942 3.63576 3.6355 1.2195 6.60519 1.2195C9.57487 1.2195 11.991 3.63573 11.991 6.60562C11.991 9.5755 9.57487 11.9918 6.60519 11.9918Z" fill="white" />
                                                <path d="M14.8206 13.9597L11.325 10.4638C11.0868 10.2256 10.701 10.2256 10.4628 10.4638C10.2246 10.7018 10.2246 11.088 10.4628 11.326L13.9585 14.8219C14.0776 14.941 14.2335 15.0006 14.3896 15.0006C14.5454 15.0006 14.7015 14.941 14.8206 14.8219C15.0588 14.5839 15.0588 14.1977 14.8206 13.9597Z" fill="white" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rent">
                                    <div class="advance__search--inner d-flex">
                                        <div class="advance__search--items">
                                            <input class="advance__search--input" placeholder="Enter Keyword..." type="text">
                                        </div>
                                        <div class="advance__search--items">
                                            <select class="advance__search--select">
                                                <option selected value="1">Property Type</option>
                                                <option value="2">Bungalow</option>
                                                <option value="3">Condo</option>
                                                <option value="4">Apartment</option>
                                                <option value="5">House</option>
                                                <option value="6">Single Family</option>
                                                <option value="7">Land</option>
                                            </select>
                                        </div>
                                        <div class="advance__search--items position-relative">
                                            <input class="advance__search--input" placeholder="Which Place?" type="text">
                                            <span class="advance__location--icon"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#8B8B8B" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="advance__search--items price">
                                            <div class="advance__search--price d-flex align-items-center justify-content-between">
                                                <span>Price</span>
                                                <label><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.34376 8.4373H5.06244V3.37489H8.43733C8.74808 3.37489 8.99977 3.1228 8.99977 2.81245C8.99977 2.50189 8.74807 2.25001 8.43733 2.25001H5.06244V0.56244C5.06244 0.251885 4.81074 0 4.5 0C4.18926 0 3.93756 0.252091 3.93756 0.56244V2.25001H3.65623C1.64026 2.25001 0 3.89027 0 5.90624C0 7.92222 1.64026 9.56248 3.65623 9.56248H3.93756V14.6249L0.562671 14.6247C0.251921 14.6247 0.000231432 14.8768 0.000231432 15.1871C0.000231432 15.4977 0.251931 15.7496 0.562671 15.7496H3.93756V17.4371C3.93756 17.7477 4.18926 17.9996 4.5 17.9996C4.81074 17.9996 5.06244 17.7475 5.06244 17.4371V15.7496H5.34376C7.35974 15.7496 9 14.1093 9 12.0933C9 10.0776 7.35974 8.4373 5.34376 8.4373V8.4373ZM3.93754 8.4373H3.65621C2.26039 8.4373 1.12511 7.30202 1.12511 5.90619C1.12511 4.51037 2.26039 3.37509 3.65621 3.37509H3.93754V8.4373ZM5.34376 14.6247H5.06244V9.56228H5.34376C6.73959 9.56228 7.87487 10.6976 7.87487 12.0934C7.87487 13.4894 6.73959 14.6247 5.34376 14.6247Z" fill="#8B8B8B" />
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="advance__search--btn solid__btn">Search Now <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.60519 0C2.96319 0 0 2.96338 0 6.60562C0 10.2481 2.96319 13.2112 6.60519 13.2112C10.2474 13.2112 13.2104 10.2481 13.2104 6.60562C13.2104 2.96338 10.2474 0 6.60519 0ZM6.60519 11.9918C3.6355 11.9918 1.21942 9.57553 1.21942 6.60565C1.21942 3.63576 3.6355 1.2195 6.60519 1.2195C9.57487 1.2195 11.991 3.63573 11.991 6.60562C11.991 9.5755 9.57487 11.9918 6.60519 11.9918Z" fill="white" />
                                                <path d="M14.8206 13.9597L11.325 10.4638C11.0868 10.2256 10.701 10.2256 10.4628 10.4638C10.2246 10.7018 10.2246 11.088 10.4628 11.326L13.9585 14.8219C14.0776 14.941 14.2335 15.0006 14.3896 15.0006C14.5454 15.0006 14.7015 14.941 14.8206 14.8219C15.0588 14.5839 15.0588 14.1977 14.8206 13.9597Z" fill="white" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="advance__wrapper position-relative text-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="250">
                                <button class="advance__option--btn position-relative" data-bs-toggle="modal" data-bs-target="#advanceModal"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 17.9991C13.9624 17.9991 18 13.9618 18 8.99957C18 4.03734 13.9624 0 9 0C4.03764 0 0 4.03734 0 8.99957C0 13.9618 4.03764 17.9991 9 17.9991ZM4.71946 8.51799H8.51846V4.71869C8.51846 4.45281 8.73429 4.23715 9 4.23715C9.26589 4.23715 9.48154 4.45298 9.48154 4.71869V8.51799H13.2805C13.5464 8.51799 13.7621 8.73382 13.7621 8.99953C13.7621 9.26541 13.5462 9.48107 13.2805 9.48107H9.48154V13.2802C9.48154 13.5461 9.26571 13.7617 9 13.7617C8.73412 13.7617 8.51846 13.5459 8.51846 13.2802V9.48107H4.71946C4.45358 9.48107 4.23792 9.26524 4.23792 8.99953C4.23792 8.73364 4.45342 8.51799 4.71946 8.51799Z" fill="#bf9839" />
                                    </svg>
                                    Advance Option
                                    <svg class="advance__shape--icon" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M35.1335 1.00117C37.5698 7.52851 36.9751 16.244 30.2919 19.7218C27.1872 21.3439 23.1141 20.9661 20.5302 18.4331C18.5253 16.4666 18.4255 13.0725 21.3194 12.1057H21.3198C23.382 11.5055 25.5918 11.996 27.2502 13.4224C33.5175 18.7384 28.0082 27.4659 22.5615 30.4041C16.2468 33.8206 8.63233 33.5036 2.39647 30.1263C1.49127 29.6372 0.691372 31.076 1.59661 31.565C8.35881 35.2256 16.536 35.548 23.362 31.8429C28.9242 28.832 33.5239 22.0715 30.6557 15.3661C30.0438 13.9374 29.0806 12.7074 27.8667 11.8038C26.6527 10.9002 25.2318 10.3561 23.7514 10.2275C21.3519 10.0163 18.289 11.0052 17.4367 13.6606C16.4419 16.6935 18.9839 19.6768 21.3203 21.0377C23.9544 22.5401 27.0702 22.7865 29.8874 21.7154C38.0807 18.5713 39.5071 8.18381 36.6548 0.556465C36.2862 -0.426609 34.7603 0.000793457 35.1339 1.00092L35.1335 1.00117Z" fill="#bf9839" />
                                        <path d="M7.22445 36.5582C5.15269 34.6297 3.18993 32.5744 1.34614 30.4033L1.18316 31.7087C4.07791 30.1324 6.83528 28.2902 9.42388 26.2036C10.2186 25.5592 9.42388 24.1092 8.62403 24.7648C6.03797 26.8527 3.28201 28.6948 0.388387 30.2699C0.179519 30.4025 0.0389309 30.6284 0.00699902 30.8837C-0.0245686 31.1391 0.0558214 31.3956 0.225407 31.5808C2.06262 33.7512 4.01795 35.8065 6.08238 37.7358C6.84002 38.4414 7.96621 37.2634 7.19791 36.5582L7.22445 36.5582Z" fill="#bf9839" />
                                    </svg>

                                </button>
                            </div>
                        </div> -->
                    <!-- Advance search filter -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero section -->

    <!-- About section -->
    <section class="about__section section--padding">
        <div class="container">
            <div class="about__inner d-flex">
                <div class="about__thumbnail position-relative" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                    <div class="about__thumbnail--list one position-relative">
                        <img src="assets/img/other/about-thumb1.png" alt="about-thumb">
                        <div class="rating__star--text">
                            <svg width="34" height="31" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 0L22.2959 9.71076L33.168 11.7467L25.569 19.7842L26.9923 30.7533L17 26.01L7.00765 30.7533L8.43098 19.7842L0.832039 11.7467L11.7041 9.71076L17 0Z" fill="#bf9839" />
                            </svg>
                            <span>5 Star Rating</span>
                        </div>
                    </div>
                    <div class="about__thumbnail--list two">
                        <img src="assets/img/other/about-thumb2.png" alt="about-thumb">
                        <!-- <div class="bideo__play">
                            <a class="bideo__play--icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                                <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9358 7.28498C12.5203 7.67662 12.5283 8.53339 11.9512 8.93591L1.99498 15.8809C1.33555 16.3409 0.430441 15.8741 0.422904 15.0701L0.294442 1.36797C0.286904 0.563996 1.1831 0.0802964 1.85104 0.527837L11.9358 7.28498Z" fill="currentColor" />
                                </svg>
                                </svg>
                                <span class="visually-hidden">Video Play</span>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="about__content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                    <div class="section__heading">
                        <h3 class="section__heading--subtitle h5"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_15_6)">
                                    <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                                    <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                                </g>
                                <defs>
                                    <clipPath>
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Trusted Real estate Care</h3>
                        <h2 class="section__heading--title">Dedicated To Providing The Best Real Estate Property </h2>
                        <p class="section__heading--desc">Royal Haven Homes and Lands Integrated Services is a distinguished real estate company offering a seamless blend of luxury, security, and modern living.</p>
                    </div>
                    <div class="about__content--info d-flex">
                        <div class="about__content--info__list d-flex align-items-center">
                            <div class="about__content--info__icon">
                                <img src="assets/img/other/about-info-icon.png" alt="icon">
                            </div>
                            <h3 class="about__content--info__title">Exceptional Experience</h3>
                        </div>
                        <div class="about__content--info__list d-flex align-items-center">
                            <div class="about__content--info__icon">
                                <img src="assets/img/other/about-info-icon2.png" alt="icon">
                            </div>
                            <h3 class="about__content--info__title">Friendly Support
                                Team</h3>
                        </div>
                    </div>
                    <div class="about__content--details d-flex align-items-center">
                        <div class="about__experince">
                            <span class="about__experince--number">9+</span>
                            <span class="about__experince--text">Years of Experince</span>
                        </div>
                        <div class="living__details--content__wrapper">
                            <p class="living__details--content__list"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0.25C3.95 0.25 0.25 3.95 0.25 8.5C0.25 13.05 3.95 16.75 8.5 16.75C13.05 16.75 16.75 13.05 16.75 8.5C16.75 3.95 13.05 0.25 8.5 0.25ZM8.5 15.25C4.775 15.25 1.75 12.225 1.75 8.5C1.75 4.775 4.775 1.75 8.5 1.75C12.225 1.75 15.25 4.775 15.25 8.5C15.25 12.225 12.225 15.25 8.5 15.25Z" fill="#bf9839" />
                                    <path d="M11.625 5.97505L7.525 9.87505L5.4 7.75005C5.1 7.45005 4.625 7.45005 4.35 7.75005C4.05 8.05005 4.05 8.52505 4.35 8.80005L7 11.45C7.15 11.6 7.35 11.675 7.525 11.675C7.7 11.675 7.9 11.6 8.05 11.475L12.675 7.07505C12.975 6.80005 12.975 6.32505 12.7 6.02505C12.4 5.70005 11.925 5.70005 11.625 5.97505Z" fill="#bf9839" />
                                </svg>
                                Land Development
                            </p>
                            <p class="living__details--content__list"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0.25C3.95 0.25 0.25 3.95 0.25 8.5C0.25 13.05 3.95 16.75 8.5 16.75C13.05 16.75 16.75 13.05 16.75 8.5C16.75 3.95 13.05 0.25 8.5 0.25ZM8.5 15.25C4.775 15.25 1.75 12.225 1.75 8.5C1.75 4.775 4.775 1.75 8.5 1.75C12.225 1.75 15.25 4.775 15.25 8.5C15.25 12.225 12.225 15.25 8.5 15.25Z" fill="#bf9839" />
                                    <path d="M11.625 5.97505L7.525 9.87505L5.4 7.75005C5.1 7.45005 4.625 7.45005 4.35 7.75005C4.05 8.05005 4.05 8.52505 4.35 8.80005L7 11.45C7.15 11.6 7.35 11.675 7.525 11.675C7.7 11.675 7.9 11.6 8.05 11.475L12.675 7.07505C12.975 6.80005 12.975 6.32505 12.7 6.02505C12.4 5.70005 11.925 5.70005 11.625 5.97505Z" fill="#bf9839" />
                                </svg>
                                Consultancy Services & Property Management
                            </p>
                            <p class="living__details--content__list"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0.25C3.95 0.25 0.25 3.95 0.25 8.5C0.25 13.05 3.95 16.75 8.5 16.75C13.05 16.75 16.75 13.05 16.75 8.5C16.75 3.95 13.05 0.25 8.5 0.25ZM8.5 15.25C4.775 15.25 1.75 12.225 1.75 8.5C1.75 4.775 4.775 1.75 8.5 1.75C12.225 1.75 15.25 4.775 15.25 8.5C15.25 12.225 12.225 15.25 8.5 15.25Z" fill="#bf9839" />
                                    <path d="M11.625 5.97505L7.525 9.87505L5.4 7.75005C5.1 7.45005 4.625 7.45005 4.35 7.75005C4.05 8.05005 4.05 8.52505 4.35 8.80005L7 11.45C7.15 11.6 7.35 11.675 7.525 11.675C7.7 11.675 7.9 11.6 8.05 11.475L12.675 7.07505C12.975 6.80005 12.975 6.32505 12.7 6.02505C12.4 5.70005 11.925 5.70005 11.625 5.97505Z" fill="#bf9839" />
                                </svg>
                                Unmatched Expertise
                            </p>

                        </div>
                    </div>
                    <div class="about__content--footer d-flex align-items-center">
                        <a class="solid__btn" href="about.php">More about us</a>
                        <!-- <div class="about__video--play">
                            <a class="about__video--icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                                <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9358 7.28498C12.5203 7.67662 12.5283 8.53339 11.9512 8.93591L1.99498 15.8809C1.33555 16.3409 0.430441 15.8741 0.422904 15.0701L0.294442 1.36797C0.286904 0.563996 1.1831 0.0802964 1.85104 0.527837L11.9358 7.28498Z" fill="currentColor" />
                                </svg>
                                <span class="visually-hidden">Video Play</span>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section -->

    <!-- featured section -->
    <section class="featured__section section--padding" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
        <div class="container-fluid">
            <div class="section__heading mb-40">
                <h3 class="section__heading--subtitle h5"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_6)">
                            <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                            <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Trusted Real estate Care</h3>
                <h2 class="section__heading--title">Our Latest Listings</h2>
            </div>
            <div class="featured__inner position-relative">
                <div class="featured__column4 swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($properties as $property): ?>
                            <?php if ($property['category'] == 'Buildings' || $property['category'] == 'Lands'): ?>
                                <div class="swiper-slide">
                                    <article class="featured__card">
                                        <div class="featured__thumbnail position-relative">
                                            <div class="media">
                                                <a class="featured__thumbnail--link" href="listing-details.php?id=<?php echo $property['id'] ?>"><img class="featured__thumbnail--img" src="functions/<?php echo $property['image'] ?>" alt="featured-img"></a>
                                            </div>
                                            <div class="featured__badge">
                                                <span class="badge__field">Featured</span>
                                                <span class="badge__field style2">For sale</span>
                                            </div>

                                        </div>
                                        <div class="featured__content">
                                            <div class="featured__content--top d-flex align-items-center justify-content-between">
                                                <h3 class="featured__card--title"><a href="listing-details.php?id=<?php echo $property['id'] ?>"><?php echo $property['name'] ?></a></h3>
                                                <span class="featured__card--price">$<?php echo $property['price'] ?></span>
                                            </div>
                                            <p class="featured__content--desc">
                                                <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.48287 0C2.45013 0 0 2.4501 0 5.48288C0 5.85982 0.0343013 6.21958 0.102785 6.57945C0.514031 9.69783 4.42055 11.9767 5.51712 16.4144C6.5966 12.0452 11 8.824 11 5.48288H10.9657C10.9657 2.45013 8.51548 0 5.48282 0H5.48287ZM5.48287 2.17592C7.21338 2.17592 8.61839 3.58097 8.61839 5.31144C8.61839 7.04191 7.21335 8.44696 5.48287 8.44696C3.7524 8.44696 2.34736 7.04191 2.34736 5.31144C2.34736 3.58097 3.75228 2.17592 5.48287 2.17592Z" fill="#bf9839" />
                                                </svg>
                                                <?php echo $property['address'] ?>
                                            </p>
                                            <ul class="featured__info d-flex">
                                                <li class="featured__info--items">
                                                    <span class="featured__info--icon">
                                                        <?php $property['rooms'] ?>
                                                        <svg width="25" height="21" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.26832 3.08576H9.70875C10.1912 3.08576 10.6311 3.28308 10.9488 3.6009C11.2667 3.91871 11.464 4.35756 11.464 4.841V6.17302H13.5385V4.841C13.5385 4.35996 13.7358 3.92185 14.0536 3.6033L14.056 3.60091C14.3745 3.28402 14.8119 3.08672 15.293 3.08672H18.7334C19.2145 3.08672 19.6533 3.28404 19.9719 3.60185C20.2912 3.92113 20.4885 4.35941 20.4885 4.84195V6.17398H21.9693V1.9459C21.9693 1.62975 21.8395 1.34125 21.6302 1.13212C21.4211 0.923008 21.1325 0.792937 20.8164 0.792937H4.18422C3.86807 0.792937 3.57882 0.922824 3.36969 1.13212C3.16058 1.34123 3.03051 1.62975 3.03051 1.9459V6.17398H4.51139V4.84195C4.51139 4.36016 4.7087 3.92205 5.02652 3.6035C5.3458 3.28422 5.78408 3.08691 6.26662 3.08691L6.26832 3.08576ZM0.792967 11.167H24.2084V7.96014C24.2084 7.686 24.0967 7.43638 23.916 7.25654C23.7362 7.07672 23.4865 6.96415 23.2124 6.96415H1.78733C1.51319 6.96415 1.26357 7.0758 1.08373 7.25654C0.903913 7.43635 0.791345 7.686 0.791345 7.96014V11.167H0.792967ZM24.2084 11.9594H0.792967V12.5607C0.792967 12.8341 0.905536 13.0828 1.08535 13.2636C1.26443 13.4443 1.51407 13.556 1.7882 13.556H23.2132C23.4787 13.556 23.7212 13.4506 23.8995 13.2811L23.9161 13.2636C24.0969 13.0828 24.2085 12.8341 24.2085 12.5607V11.9594H24.2084ZM22.7615 6.1718H23.2124C23.7028 6.1718 24.1498 6.37298 24.4738 6.69632C24.7986 7.02204 25 7.46883 25 7.95943V12.56C25 13.0521 24.7988 13.4989 24.4755 13.8231L24.451 13.8462C24.1293 14.1561 23.6919 14.3477 23.2125 14.3477H22.1602V16.3936C22.1602 16.6123 21.9828 16.7897 21.7641 16.7897H20.1603C19.9867 16.7881 19.8283 16.674 19.78 16.499L19.1811 14.3477H5.81838L5.22014 16.499C5.17187 16.674 5.01251 16.789 4.83987 16.789L3.23608 16.7907C3.0174 16.7907 2.83998 16.6132 2.83998 16.3945V14.3486H1.78764C1.29722 14.3486 0.850239 14.1474 0.52617 13.8241C0.201361 13.5007 0 13.053 0 12.561V7.96037C0 7.46995 0.201186 7.02297 0.524519 6.6989C0.850248 6.37409 1.29703 6.17273 1.78764 6.17273H2.2392V1.94465C2.2392 1.40909 2.45789 0.922494 2.8098 0.570599C3.16169 0.218707 3.649 0 4.18456 0H20.8167C21.3523 0 21.8389 0.218689 22.1908 0.570599C22.5427 0.922509 22.7614 1.4098 22.7614 1.94465V6.17273L22.7615 6.1718ZM21.3685 14.3473H20.0017L20.4604 15.997H21.3686L21.3685 14.3473ZM4.99954 14.3473H3.63342V15.997H4.54058L4.99933 14.3473H4.99954ZM18.7339 3.87771H15.2935C15.028 3.87771 14.7872 3.98622 14.6144 4.15977C14.4394 4.3348 14.3316 4.57578 14.3316 4.84036V6.17239H19.6975V4.84036C19.6975 4.5758 19.589 4.3348 19.4155 4.16053C19.2412 3.98698 18.9994 3.87846 18.7349 3.87846L18.7339 3.87771ZM9.70847 3.87771H6.26804C6.00347 3.87771 5.76248 3.98622 5.5882 4.15977C5.41392 4.33406 5.30614 4.57505 5.30614 4.83961V6.17163H10.6721V4.83961C10.6721 4.57578 10.5635 4.3348 10.3893 4.16053C10.215 3.98624 9.97399 3.87772 9.71018 3.87772L9.70847 3.87771Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="featured__info--text">Bedrooms</span>
                                                </li>
                                                <li class="featured__info--items">
                                                    <span class="featured__info--icon">
                                                        <?php echo $property['washrooms'] ?>
                                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.87033 9.45423V3.54819C2.87033 2.43102 3.73649 1.51634 4.83385 1.43913C4.87698 1.43607 5.08911 1.43607 5.12932 1.43913C6.14116 1.51271 6.93955 2.35728 6.93955 3.38837V3.93384C6.93955 4.11392 7.08583 4.2602 7.2659 4.2602C7.44583 4.2602 7.59225 4.11392 7.59225 3.93384V3.38837C7.59225 2.01288 6.52708 0.886385 5.17665 0.78818C5.12376 0.784247 4.84491 0.784101 4.78809 0.788035C3.35199 0.889144 2.21777 2.08632 2.21777 3.54834V9.45438C2.21777 9.63446 2.36405 9.78074 2.54413 9.78074C2.7242 9.78074 2.87048 9.63446 2.87048 9.45438L2.87033 9.45423Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.30288 6.37703C6.11936 6.37703 8.41341 6.37703 9.2303 6.37397C9.40411 6.37397 9.5686 6.28918 9.67 6.1464C9.7714 6.00362 9.79748 5.82048 9.73978 5.65512C9.7392 5.65337 9.73847 5.65162 9.73789 5.64987C9.3215 4.51741 8.364 3.74219 7.26608 3.74219C6.16842 3.74219 5.21107 4.51697 4.79121 5.64786C4.79063 5.64975 4.78975 5.65194 4.78902 5.65398C4.73118 5.82036 4.75726 6.00451 4.85925 6.14832C4.96153 6.29197 5.12689 6.37691 5.30301 6.37691H5.30287L5.30288 6.37703ZM9.06358 5.72172L8.85815 5.72216C8.32726 5.72303 7.79618 5.72347 7.26529 5.7239L5.46409 5.72434C5.80719 4.9424 6.47944 4.39502 7.266 4.39502C8.05115 4.39502 8.72235 4.94065 9.06355 5.72169L9.06358 5.72172Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9459 16.6811L16.6041 19.2054C16.6295 19.3032 16.6081 19.4073 16.5464 19.4872C16.4846 19.5673 16.3893 19.6141 16.288 19.6141H15.9611C15.8393 19.6141 15.7274 19.5462 15.6713 19.4378L14.4251 17.0308C14.3422 16.8708 14.145 16.8082 13.9851 16.8911C13.8251 16.974 13.7625 17.1711 13.8454 17.3311L15.0916 19.738C15.26 20.0629 15.5953 20.2668 15.961 20.2668H16.2879C16.5912 20.2668 16.8772 20.1265 17.0627 19.8865C17.248 19.6466 17.3118 19.3343 17.2355 19.0408L16.5774 16.5165C16.5319 16.3422 16.3534 16.2376 16.1792 16.2831C16.0049 16.3285 15.9003 16.507 15.9458 16.6813L15.9459 16.6811ZM3.75081 17.8145L3.43101 19.0406C3.35467 19.3342 3.41834 19.6463 3.60381 19.8864C3.78913 20.1263 4.07528 20.2666 4.37858 20.2666H4.70552C5.07121 20.2666 5.4066 20.0628 5.57488 19.7379L6.82114 17.3309C6.90404 17.1709 6.84139 16.9738 6.68142 16.8909C6.52145 16.808 6.32433 16.8707 6.24142 17.0306L4.99517 19.4376C4.93907 19.546 4.82718 19.6139 4.70538 19.6139H4.37845C4.27734 19.6139 4.18206 19.5671 4.12014 19.487C4.05836 19.4072 4.03709 19.303 4.06244 19.2052L4.38224 17.9791C4.42769 17.8048 4.32309 17.6264 4.14884 17.5809C3.97459 17.5354 3.79611 17.64 3.75065 17.8143L3.75081 17.8145Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.39897 12.6334C1.66763 15.3711 3.97615 17.51 6.78435 17.51H13.8888C16.8772 17.51 19.3002 15.0871 19.3002 12.0985V11.3C19.3002 11.1199 19.154 10.9736 18.9739 10.9736C18.7938 10.9736 18.6475 11.1199 18.6475 11.3V12.0985C18.6475 14.7265 16.5169 16.8573 13.8888 16.8573H6.78435C4.31515 16.8573 2.28516 14.9767 2.0487 12.5696C2.03107 12.3902 1.8711 12.2591 1.69189 12.2767C1.51255 12.2944 1.38142 12.4541 1.39905 12.6334L1.39897 12.6334Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9141 9.54315V13.757C11.9141 14.2977 12.3523 14.7361 12.8931 14.7361H15.9913C16.5319 14.7361 16.9703 14.2977 16.9703 13.757V9.54315C16.9703 9.36307 16.8239 9.2168 16.644 9.2168C16.4639 9.2168 16.3176 9.36307 16.3176 9.54315V13.757C16.3176 13.9371 16.1713 14.0834 15.9913 14.0834H12.8931C12.7128 14.0834 12.5668 13.9371 12.5668 13.757V9.54315C12.5668 9.36307 12.4203 9.2168 12.2404 9.2168C12.0603 9.2168 11.9141 9.36307 11.9141 9.54315Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6441 12.7197H12.2404C12.0603 12.7197 11.9141 12.866 11.9141 13.0461C11.9141 13.2262 12.0603 13.3724 12.2404 13.3724H16.6441C16.824 13.3724 16.9705 13.2262 16.9705 13.0461C16.9705 12.866 16.824 12.7197 16.6441 12.7197Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.13137 7.14457L4.58925 8.12975C4.50242 8.28753 4.56011 8.48611 4.7179 8.57295C4.87568 8.65993 5.07426 8.60238 5.1611 8.4446L5.70352 7.45927C5.79035 7.30149 5.73266 7.10291 5.57487 7.01607C5.41694 6.92924 5.21822 6.98664 5.13152 7.14472L5.13137 7.14457Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.83241 7.45932L9.37453 8.44464C9.46136 8.60243 9.65994 8.65998 9.81773 8.573C9.97552 8.48617 10.0331 8.28759 9.94638 8.12979L9.40426 7.14462C9.31743 6.98669 9.11885 6.92929 8.96091 7.01598C8.80312 7.10281 8.74557 7.30139 8.83255 7.45918L8.83241 7.45932Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.93945 7.30194V8.28711C6.93945 8.46719 7.08573 8.61346 7.26581 8.61346C7.44574 8.61346 7.59216 8.46719 7.59216 8.28711V7.30194C7.59216 7.12186 7.44574 6.97559 7.26581 6.97559C7.08573 6.97559 6.93945 7.12186 6.93945 7.30194Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6243 4.06633V0.761705C19.6243 0.559628 19.5441 0.366017 19.4013 0.223206C19.2584 0.0802819 19.0647 0.000148467 18.8628 0.000148467H18.2895C18.0876 0.000148467 17.8938 0.0802782 17.751 0.223206C17.6082 0.365984 17.5279 0.559609 17.5279 0.761705V4.06633C17.5279 4.2464 17.6742 4.39268 17.8543 4.39268C18.0344 4.39268 18.1806 4.2464 18.1806 4.06633V0.761705C18.1806 0.732713 18.192 0.705177 18.2124 0.684634C18.2328 0.664237 18.2605 0.652873 18.2895 0.652873H18.8628C18.8918 0.652873 18.9193 0.664237 18.9395 0.684634C18.9599 0.705031 18.9716 0.732714 18.9716 0.761705V4.06633C18.9716 4.2464 19.1179 4.39268 19.2979 4.39268C19.478 4.39268 19.6243 4.2464 19.6243 4.06633H19.6243ZM17.061 4.06633V2.02881C17.061 1.60821 16.7201 1.26727 16.2995 1.26727H16.2951C16.2664 1.26727 16.2387 1.25576 16.2183 1.23522C16.1979 1.21482 16.1863 1.18714 16.1863 1.15844V0.761557C16.1863 0.55948 16.1061 0.365869 15.9632 0.223057C15.8204 0.0801335 15.6268 0 15.4247 0H14.8619C14.66 0 14.4662 0.0801297 14.3234 0.223057C14.1806 0.365835 14.1003 0.559461 14.1003 0.761557V1.15844C14.1003 1.18714 14.0888 1.21482 14.0683 1.23522C14.048 1.25562 14.0202 1.26727 13.9915 1.26727H13.9871C13.5665 1.26727 13.2256 1.60819 13.2256 2.02881V4.06633C13.2256 4.2464 13.3719 4.39268 13.5519 4.39268C13.732 4.39268 13.8783 4.2464 13.8783 4.06633V2.02881C13.8783 1.96849 13.9271 1.91998 13.9871 1.91998H13.9915C14.1934 1.91998 14.387 1.8397 14.53 1.69677C14.6728 1.554 14.7531 1.36037 14.7531 1.15842V0.761541C14.7531 0.732548 14.7646 0.705013 14.7848 0.68447C14.8052 0.664073 14.8329 0.652709 14.8619 0.652709H15.4247C15.4537 0.652709 15.4812 0.664073 15.5018 0.68447C15.5222 0.704867 15.5335 0.73255 15.5335 0.761541V1.15842C15.5335 1.36035 15.6138 1.55396 15.7567 1.69677C15.8995 1.8397 16.0931 1.91998 16.2951 1.91998H16.2995C16.3595 1.91998 16.4083 1.96849 16.4083 2.02852V4.06634C16.4083 4.24641 16.5546 4.39269 16.7346 4.39269C16.9147 4.39269 17.061 4.24641 17.061 4.06634L17.061 4.06633Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.6706 4.50374C20.6706 4.30167 20.5904 4.10806 20.4476 3.96524C20.3046 3.82232 20.111 3.74219 19.9091 3.74219H12.8241C12.622 3.74219 12.4284 3.82232 12.2856 3.96524C12.1426 4.10802 12.0625 4.30165 12.0625 4.50374V5.07704C12.0625 5.27897 12.1426 5.47258 12.2856 5.61554C12.4283 5.75832 12.622 5.8386 12.8241 5.8386H19.9091C20.111 5.8386 20.3046 5.75832 20.4476 5.61554C20.5903 5.47262 20.6706 5.27899 20.6706 5.07704V4.50374ZM20.0179 4.50374V5.07704C20.0179 5.10574 20.0064 5.13357 19.9862 5.15382C19.9658 5.17422 19.9381 5.18588 19.9091 5.18588H12.8241C12.7951 5.18588 12.7675 5.17437 12.747 5.15382C12.7266 5.13357 12.7152 5.10574 12.7152 5.07704V4.50374C12.7152 4.47475 12.7266 4.44722 12.747 4.42667C12.7674 4.40628 12.7951 4.39491 12.8241 4.39491H19.9091C19.9381 4.39491 19.9656 4.40628 19.9862 4.42667C20.0064 4.44707 20.0179 4.47475 20.0179 4.50374Z" fill="black"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7962 11.6283H19.69C19.9496 11.6283 20.1986 11.5251 20.3823 11.3415C20.5659 11.158 20.6691 10.9088 20.6691 10.6492V10.1958C20.6691 9.93607 20.5659 9.68691 20.3823 9.50352C20.1988 9.31995 19.9496 9.2168 19.69 9.2168H0.979038C0.719414 9.2168 0.470413 9.31995 0.286724 9.50352C0.10315 9.68695 0 9.9361 0 10.1958V10.6492C0 10.9088 0.10315 11.1578 0.286724 11.3415C0.470298 11.5251 0.719448 11.6283 0.979038 11.6283H11.0691C11.2492 11.6283 11.3955 11.482 11.3955 11.3019C11.3955 11.1218 11.2492 10.9756 11.0691 10.9756H0.979038C0.892497 10.9756 0.809596 10.9412 0.74826 10.8798C0.68707 10.8186 0.652686 10.7357 0.652686 10.6492V10.1958C0.652686 10.1093 0.687069 10.0261 0.74826 9.96504C0.809596 9.90385 0.892497 9.86946 0.979038 9.86946H19.69C19.7766 9.86946 19.8595 9.90385 19.9208 9.96504C19.982 10.0262 20.0164 10.1093 20.0164 10.1958V10.6492C20.0164 10.7357 19.982 10.8186 19.9208 10.8798C19.8595 10.9412 19.7766 10.9756 19.69 10.9756H17.7962C17.6161 10.9756 17.4698 11.1218 17.4698 11.3019C17.4698 11.482 17.6161 11.6283 17.7962 11.6283Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="featured__info--text">Bathrooms</span>
                                                </li>
                                                <li class="featured__info--items">
                                                    <span class="featured__info--icon">
                                                        <?php $property['name'] ?>
                                                        <svg width="19" height="20" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.8417 17.2754L0.685046 0.116923C0.569917 0.00263286 0.39646 -0.0311375 0.247421 0.0301228C0.097685 0.0938982 0 0.239308 0 0.401336L0.00181414 17.593C0.00181414 17.8144 0.178622 17.994 0.400928 17.994H17.5973C17.8196 17.994 18 17.8145 18 17.593C17.9997 17.4634 17.9371 17.3485 17.8419 17.2756L17.8417 17.2754ZM0.80258 17.1915V1.36951L2.73813 3.30506L1.77607 4.26741C1.62006 4.42384 1.62006 4.67906 1.77607 4.83525C1.85366 4.91284 1.95735 4.95289 2.06019 4.95289C2.16207 4.95289 2.26491 4.91284 2.3425 4.83525L3.30595 3.87265L5.02184 5.58868L4.0602 6.55113C3.90419 6.70854 3.90419 6.96168 4.0602 7.11783C4.13779 7.19639 4.24064 7.23547 4.34433 7.23547C4.44717 7.23547 4.55002 7.19625 4.62761 7.11783L5.58996 6.15677L7.29369 7.86011L6.33135 8.82396C6.17547 8.97956 6.17547 9.23407 6.33135 9.39094C6.41061 9.46937 6.5136 9.50858 6.61547 9.50858C6.71832 9.50858 6.82116 9.46937 6.89959 9.39094L7.86194 8.42835L9.56639 10.1331L8.60351 11.0957C8.4493 11.2517 8.4493 11.5062 8.60351 11.6631C8.68277 11.7415 8.78576 11.7807 8.88944 11.7807C8.99229 11.7807 9.09248 11.7415 9.17273 11.6621L10.1339 10.7001L11.8393 12.4053L10.8773 13.3677C10.7203 13.5237 10.7203 13.7782 10.8773 13.9342C10.9549 14.0136 11.0576 14.0531 11.1611 14.0531C11.2641 14.0531 11.3658 14.0139 11.4434 13.9342L12.4063 12.9726L14.1117 14.6779L13.1491 15.6395C12.9921 15.7945 12.9921 16.0492 13.1491 16.2083C13.2267 16.2859 13.3301 16.3241 13.433 16.3241C13.535 16.3241 13.6373 16.2859 13.7154 16.2083L14.6787 15.2454L16.625 17.1917L0.80258 17.1915Z" fill="black"></path>
                                                            <path d="M3.52378 9.14585C3.40949 9.02946 3.23715 8.99583 3.08726 9.05821C2.93823 9.11961 2.83984 9.26544 2.83984 9.42871V14.7534C2.83984 14.9755 3.0193 15.1552 3.2416 15.1552H8.5717C8.794 15.1552 8.97442 14.9757 8.97442 14.7534C8.97442 14.6242 8.91176 14.5098 8.81673 14.4365L3.52378 9.14585ZM3.64324 14.353L3.64142 10.3976L7.59863 14.3534L3.64324 14.353Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="featured__info--text">Square Ft</span>
                                                </li>
                                            </ul>

                                        </div>
                                    </article>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="featured__navigation">
                    <div class="swiper__nav--btn swiper-button-disabled swiper-button-prev">
                        <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.223772 5.27955L5.27967 0.223543C5.42399 0.0792188 5.61635 0 5.82145 0C6.02678 0 6.21902 0.0793326 6.36335 0.223543L6.82238 0.682693C6.96659 0.82679 7.04604 1.01926 7.04604 1.22448C7.04604 1.42958 6.96659 1.62854 6.82238 1.77264L3.87285 4.72866H13.2437C13.6662 4.72866 14 5.05942 14 5.48203V6.13115C14 6.55376 13.6662 6.91788 13.2437 6.91788H3.83939L6.82227 9.8904C6.96648 10.0347 7.04593 10.222 7.04593 10.4272C7.04593 10.6322 6.96648 10.8221 6.82227 10.9663L6.36323 11.424C6.21891 11.5683 6.02667 11.647 5.82134 11.647C5.61623 11.647 5.42388 11.5673 5.27955 11.423L0.223659 6.3671C0.0789928 6.22232 -0.000566483 6.02905 1.90735e-06 5.82361C-0.000452995 5.61748 0.0789928 5.4241 0.223772 5.27955Z" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.7762 5.27955L8.72033 0.223543C8.57601 0.0792188 8.38365 0 8.17855 0C7.97322 0 7.78098 0.0793326 7.63665 0.223543L7.17762 0.682693C7.03341 0.82679 6.95396 1.01926 6.95396 1.22448C6.95396 1.42958 7.03341 1.62854 7.17762 1.77264L10.1272 4.72866H0.756335C0.333835 4.72866 0 5.05942 0 5.48203V6.13115C0 6.55376 0.333835 6.91788 0.756335 6.91788H10.1606L7.17773 9.8904C7.03352 10.0347 6.95407 10.222 6.95407 10.4272C6.95407 10.6322 7.03352 10.8221 7.17773 10.9663L7.63677 11.424C7.78109 11.5683 7.97333 11.647 8.17866 11.647C8.38377 11.647 8.57612 11.5673 8.72045 11.423L13.7763 6.3671C13.921 6.22232 14.0006 6.02905 14 5.82361C14.0005 5.61748 13.921 5.4241 13.7762 5.27955Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured section -->

    <!-- Location section -->
    <section class="location__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-50" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <h3 class="section__heading--subtitle color__white h5">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_6)">
                            <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                            <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>Empowering </span>
                    Your Real Estate Journey
                </h3>
                <h2 class="section__heading--title color__white">With an Extensive Array of <span>Resources</span></h2>
            </div>
            <div class="location__container" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                <div class="location__inner d-flex">
                    <ul class="location__step">
                        <li class="location__list active d-flex align-items-center" data-location-name="california">
                            <div class="location__map">
                                <img src="assets/img/main_pics/11668185_20945088.svg" class="rounded-pill" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Expert Consultations</h3>
                                    <span class="location__properties--count">Guided decision Making</span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                        <li class="location__list d-flex align-items-center" data-location-name="morocco">
                            <div class="location__map ">
                                <img class="rounded-pill" src="assets/img/main_pics/real-estate-searching-with-characters_23-2148650960.jpg" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Property Listings </h3>
                                    <span class="location__properties--count">Diverse range fitted to your needs</span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                        <li class="location__list d-flex align-items-center" data-location-name="bahrain">
                            <div class="location__map">
                                <img src="assets/img/main_pics/female-lawyer-concept-illustration_114360-20386.jpg" class="rounded-pill" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Legal and Documentation Support</h3>
                                    <span class="location__properties--count">Property documentation & Legal requirements</span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <ul class="location__step step__img">
                        <li class="location__thumbnail d-block" data-location-name="california">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    Personalized Real Estate Guidance
                                    At our company, we pride ourselves on offering personalized advice tailored to your unique needs and circumstances. Our team consists of experienced professionals who possess a deep understanding of the real estate sector.
                                    We recognize that navigating the complexities of real estate can be daunting. That’s why we are dedicated to guiding you every step of the way. Our experts are here to provide you with the insights and knowledge necessary to help you make informed decisions. Whether you are buying, selling, or investing in property, our goal is to empower you with the information and confidence needed to achieve your real estate objectives.
                                </article>
                            </div>
                        </li>
                        <li class="location__thumbnail d-none" data-location-name="morocco">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    We offer a diverse range of homes, land, and investment opportunities specifically designed to align with your lifestyle and budget. Whether you are a first-time homebuyer, an experienced investor, or someone looking to expand your property portfolio, we have options that cater to various preferences and financial capabilities. Understanding that each individual has unique financial situations and lifestyle aspirations is crucial. Our team of experienced professionals is dedicated to guiding you through the process, ensuring that you find the right fit that not only meets your budget but also enhances your lifestyle.
                                </article>
                            </div>

                        </li>
                        <li class="location__thumbnail d-none" data-location-name="bahrain">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    Streamlined Documentation and Contract Support is a crucial aspect of our real estate services. We understand that navigating the paperwork and legal requirements associated with property transactions can be overwhelming, especially for those unfamiliar with local regulations.
                                    We provide thorough support in managing all necessary documentation for your real estate transaction:
                                    Property Verification,
                                    Contract Preparation,
                                    Permit Compliance.
                                    Our team is dedicated to guiding you through this process seamlessly.By offering this comprehensive documentation and legal support, we aim to make your property transaction as smooth and stress-free as possible, allowing you to focus on the excitement of your new property investment.
                                </article>
                            </div>

                        </li>
                        <li class="location__thumbnail d-none" data-location-name="afghanistan">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    Access to top-notch contractors, quality building materials, and reliable land development services is essential for successful real estate projects. Here’s an overview of the best resources available to ensure your construction and development needs are met efficiently.By leveraging access to these contractors, building materials, and development services, you can enhance the success of your real estate projects while ensuring they align with your vision and standards.
                                </article>
                            </div>

                        </li>
                        <li class="location__thumbnail d-none" data-location-name="mexico">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    Staying ahead in the real estate market requires a keen understanding of the latest trends, comprehensive market reports, and emerging investment opportunities. With our market insights you can get access to real estate trends, market reports, invetsment opportuities. By keeping abreast of these trends and opportunities through detailed market reports and analysis, you can position yourself strategically within the evolving landscape of real estate investment.
                                </article>
                            </div>

                        </li>
                        <li class="location__thumbnail d-none" data-location-name="namibia">
                            <div class="location__thumbnail-media">
                                <article class="text-white mt-1 p-3 lh-lg article">
                                    Effective property management is crucial for maximizing returns on your investments and ensuring long-term success in the real estate market. Our comprehensive support services are designed to alleviate the burdens of property ownership while enhancing your investment's performance.
                                    By providing ongoing support for managing your properties, maximizing returns, and ensuring long-term success, we empower you to focus on other priorities while we handle the complexities of property management. With our expertise at your disposal, you can confidently navigate the real estate landscape and achieve your investment goals.
                                </article>
                            </div>

                        </li>
                    </ul>
                    <ul class="location__step">
                        <li class="location__list d-flex align-items-center" data-location-name="afghanistan">
                            <div class="location__map">
                                <img src="assets/img/main_pics/engineering-construction-illustration_23-2148886139.jpg" class="rounded-pill" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Construction and Development Tools </h3>
                                    <span class="location__properties--count">Land development services</span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                        <li class="location__list d-flex align-items-center" data-location-name="mexico">
                            <div class="location__map">
                                <img src="assets/img/main_pics/gradient-insights-illustration_23-2149322241.jpg" class="rounded-pill" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Market Insights</h3>
                                    <span class="location__properties--count">Investment opportunities and Trends </span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                        <li class="location__list d-flex align-items-center" data-location-name="namibia">
                            <div class="location__map">
                                <img src="assets/img/main_pics/flat-design-real-estate-searching-with-laptop-magnifier_23-2148665257.jpg" class="rounded-pill" alt="map">
                            </div>
                            <div class="location__content d-flex align-items-center justify-content-between">
                                <div class="location__content--left">
                                    <h3 class="location__name">Property Management Solutions</h3>
                                    <span class="location__properties--count">Ensuring long-term success</span>
                                </div>
                                <span class="location__icon"><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3809 1.6338L15.381 1.6342L15.9962 12.3418C16.006 12.514 15.9489 12.6787 15.8317 12.8102C15.7144 12.9418 15.5573 13.0174 15.3851 13.0274L15.3809 1.6338ZM15.3809 1.6338C15.3712 1.46168 15.2951 1.30368 15.1624 1.18592L15.1605 1.18426C15.0298 1.06706 14.8643 1.00927 14.6912 1.0191C14.6911 1.0191 14.691 1.0191 14.691 1.01911L3.98364 1.63417C3.81073 1.6441 3.65336 1.71984 3.53665 1.85078C3.41856 1.98325 3.36155 2.14754 3.37139 2.31874L3.37143 2.31948L3.4257 3.28954C3.42571 3.28973 3.42572 3.28992 3.42573 3.29012C3.43586 3.46382 3.51 3.61791 3.63972 3.73354C3.76832 3.84817 3.92645 3.90285 4.10234 3.89293C4.1025 3.89293 4.10266 3.89292 4.10282 3.89291L10.4074 3.51975L11.6154 3.44825L10.8102 4.35157L1.4239 14.8819C1.20269 15.1301 1.223 15.5528 1.50939 15.8081L2.23623 16.456C2.50136 16.6923 2.88907 16.6705 3.12876 16.4016L12.4817 5.90868L13.2836 5.00898L13.354 6.21215L13.7201 12.4652L13.7202 12.466C13.7297 12.6335 13.8096 12.7987 13.9442 12.9188C14.0758 13.036 14.2407 13.0931 14.4126 13.0832L14.4128 13.0831L15.3849 13.0274L15.3809 1.6338Z" stroke="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <img class="shape__250" src="assets/img/other/shape-250%2b.png" alt="img">
    </section>
    <!-- Location section -->

    <!-- Property Type section -->
    <section class="property__type--section section--padding">
        <div class="container">
            <div class="section__heading gap-40 d-flex align-items-center justify-content-between mb-50" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <div class="section__heading--left">
                    <h3 class="section__heading--subtitle h5">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_15_6)">
                                <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                                <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                            </g>
                            <defs>
                                <clipPath>
                                    <rect width="18" height="18" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Trusted Real estate Care
                    </h3>
                    <h2 class="section__heading--title">Variety of Properties</h2>
                </div>
                <div class="section__heading--right">
                    <p class="section__heading--desc m-0">We specialize in providing exceptional homes and lands that cater to a variety of lifestyles, whether you’re a first-time homebuyer, investor, or looking for your dream home.

                    </p>
                </div>
            </div>
            <div class="property__type--inner d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                <div class="property__type--box">
                    <div class="property__type--icon">
                        <div class="svg-image">
                            <img src="assets/img/main_pics/map.png" alt="">
                        </div>
                        <span class="property__type--badge">13</span>
                    </div>
                    <div class="property__type--content">
                        <h3 class="property__type--title"><a href="listing.php">Lands</a></h3>
                        <span class="property__type--subtitle">Sale / Lease</span>
                    </div>
                </div>
                <div class="property__type--box">
                    <div class="property__type--icon">
                        <span>
                            <svg width="87" height="84" viewBox="0 0 87 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M85.7573 52.2154L63.9884 37.2489V18.4697L68.9445 21.9014C69.819 22.4732 71.0825 22.2824 71.6656 21.4246C72.2487 20.5668 72.0541 19.3275 71.1796 18.7555L44.4544 0.357575C43.7738 -0.119192 42.8993 -0.119192 42.2193 0.357575L15.3969 18.7555C14.5224 19.3274 14.3279 20.5669 14.9109 21.4246C15.4939 22.2824 16.7575 22.4732 17.632 21.9014L22.5881 18.4697V37.2489L0.819223 52.2154C-0.0552644 52.7873 -0.24982 54.0268 0.333172 54.8845C0.916164 55.7423 2.17982 55.9332 3.05429 55.3613L12.481 48.9745V75.7611C12.481 79.9556 15.9796 83.3873 20.2558 83.3873H66.4175C70.6937 83.3873 74.1923 79.9556 74.1923 75.7611L74.1917 48.8791L83.6184 55.266C84.5905 55.647 85.7564 55.1709 86.1449 54.1223C86.3395 53.4547 86.2426 52.7877 85.7565 52.2159L85.7573 52.2154ZM26.4759 15.8009L43.2883 4.26676L60.1007 15.8015V34.5808L44.4543 23.9038C43.7737 23.427 42.8993 23.427 42.2193 23.9038L26.4759 34.5801V15.8009ZM49.8969 79.6693H36.5831V69.8507C36.5831 66.705 39.2072 64.1308 42.4144 64.1308H44.1633C47.3703 64.1308 49.9946 66.7048 49.9946 69.8507L49.8969 79.6693ZM70.2081 75.8566C70.2081 77.9538 68.4591 79.6693 66.3211 79.6693H53.881V69.8507C53.881 64.6076 49.508 60.3181 44.1628 60.3181H42.4138C37.0686 60.3181 32.6956 64.6076 32.6956 69.8507V79.5742H20.1587C18.0207 79.5742 16.2717 77.8586 16.2717 75.7615V46.2104L43.2885 27.7171L70.3053 46.2104L70.2081 75.8566Z" fill="#000" />
                            </svg>
                        </span>
                        <span class="property__type--badge">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_15_6)">
                                    <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="currentColor" />
                                    <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="currentColor" />
                                </g>
                                <defs>
                                    <clipPath>
                                        <rect width="18" height="18" fill="currentColor" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </div>
                    <div class="property__type--content">
                        <h3 class="property__type--title"><a href="project.php">Exceptional Homes</a></h3>
                        <span class="property__type--subtitle">Sale / Lease</span>
                    </div>
                </div>
                <div class="property__type--box">
                    <div class="property__type--icon">
                        <div class="svg-image">
                            <img src="assets/img/main_pics/concrete.png" alt="">
                        </div>
                        <span class="property__type--badge">16</span>
                    </div>
                    <div class="property__type--content">
                        <h3 class="property__type--title"><a href="#materials">Building Materials</a></h3>
                        <span class="property__type--subtitle">Sale</span>
                    </div>
                </div>
                <div class="property__type--box">
                    <div class="property__type--icon">
                        <div class="svg-image">
                            <img src="assets/img/main_pics/car-key.png" alt="">
                        </div>
                        <span class="property__type--badge"><svg width="18" height="18" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 0L22.2959 9.71076L33.168 11.7467L25.569 19.7842L26.9923 30.7533L17 26.01L7.00765 30.7533L8.43098 19.7842L0.832039 11.7467L11.7041 9.71076L17 0Z" fill="currentColor" />
                            </svg></span>
                    </div>
                    <div class="property__type--content">
                        <h3 class="property__type--title"><a href="project.php">Cars</a></h3>
                        <span class="property__type--subtitle">Sale / Lease</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Type section -->

    <!-- Popular featured section  -->
    <section class="popular__featured--section section--padding">
        <div class="container-fluid p-0">
            <div class="section__heading text-center mb-50" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <h3 class="section__heading--subtitle color__white h5"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_6)">
                            <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                            <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>Trusted</span> Real estate Care
                </h3>
                <h2 class="section__heading--title color__white">Most <span>Popular</span> Locations</h2>
            </div>
            <div class="popular__featured--inner" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                <div class="popular__featured--column5 swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (4).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Asaba</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284.jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Lagos</h3>
                                        <h5 class="popular__featured--subtitle">More DETAILS
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (2).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Enugu</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (3).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Anambra</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (5).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Abuja</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (6).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Abia</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (7).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Imo</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="popular__featured--card">
                                <div class="popular__featured--thumbnail position-relative">
                                    <a class="popular__featured--link" href=""><img class="popular__featured--img" src="assets/img/main_pics/image-246x284 (8).jpg" alt="popular-properties"></a>
                                    <div class="popular__featured--content">
                                        <h3 class="popular__featured--title">Delta</h3>
                                        <h5 class="popular__featured--subtitle">State
                                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4219 1.67528L17.3926 13.422C17.3918 13.7573 17.2595 14.0725 17.0207 14.3101C16.7816 14.548 16.4657 14.6784 16.1306 14.6777L15.0639 14.6749C14.729 14.6742 14.4135 14.5421 14.1757 14.3031C13.938 14.0643 13.8 13.7405 13.801 13.4056L13.8106 6.54525L2.89752 17.4038C2.40548 17.8934 1.63343 17.895 1.14372 17.4028L0.391553 16.6469C-0.098156 16.1547 -0.131297 15.3438 0.360739 14.8543L11.3128 3.95695L4.39453 3.95165C4.05934 3.95068 3.74986 3.82469 3.51207 3.5857C3.27453 3.34697 3.14693 3.03368 3.14777 2.69863L3.15202 1.63372C3.15286 1.29841 3.28561 0.984048 3.52473 0.746117C3.76359 0.50845 4.07993 0.378344 4.41525 0.379184L16.1618 0.408607C16.4981 0.40958 16.8147 0.542466 17.0521 0.782382C17.2914 1.02191 17.423 1.33917 17.4219 1.67528Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper__nav--btn swiper-button-disabled swiper-button-prev">
                        <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.223772 5.27955L5.27967 0.223543C5.42399 0.0792188 5.61635 0 5.82145 0C6.02678 0 6.21902 0.0793326 6.36335 0.223543L6.82238 0.682693C6.96659 0.82679 7.04604 1.01926 7.04604 1.22448C7.04604 1.42958 6.96659 1.62854 6.82238 1.77264L3.87285 4.72866H13.2437C13.6662 4.72866 14 5.05942 14 5.48203V6.13115C14 6.55376 13.6662 6.91788 13.2437 6.91788H3.83939L6.82227 9.8904C6.96648 10.0347 7.04593 10.222 7.04593 10.4272C7.04593 10.6322 6.96648 10.8221 6.82227 10.9663L6.36323 11.424C6.21891 11.5683 6.02667 11.647 5.82134 11.647C5.61623 11.647 5.42388 11.5673 5.27955 11.423L0.223659 6.3671C0.0789928 6.22232 -0.000566483 6.02905 1.90735e-06 5.82361C-0.000452995 5.61748 0.0789928 5.4241 0.223772 5.27955Z" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.7762 5.27955L8.72033 0.223543C8.57601 0.0792188 8.38365 0 8.17855 0C7.97322 0 7.78098 0.0793326 7.63665 0.223543L7.17762 0.682693C7.03341 0.82679 6.95396 1.01926 6.95396 1.22448C6.95396 1.42958 7.03341 1.62854 7.17762 1.77264L10.1272 4.72866H0.756335C0.333835 4.72866 0 5.05942 0 5.48203V6.13115C0 6.55376 0.333835 6.91788 0.756335 6.91788H10.1606L7.17773 9.8904C7.03352 10.0347 6.95407 10.222 6.95407 10.4272C6.95407 10.6322 7.03352 10.8221 7.17773 10.9663L7.63677 11.424C7.78109 11.5683 7.97333 11.647 8.17866 11.647C8.38377 11.647 8.57612 11.5673 8.72045 11.423L13.7763 6.3671C13.921 6.22232 14.0006 6.02905 14 5.82361C14.0005 5.61748 13.921 5.4241 13.7762 5.27955Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <p class="featured__support--desc text-center">Every client’s unique needs and <a href="javascript:void(0)">preferences </a> drive our solutions</p>
            </div>
        </div>
    </section>
    <!-- Popular featured section  -->

    <!-- Start counterup banner section -->
    <div class="counterup__section" id="funfactId" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
        <div class="container">
            <div class="row row-cols-1 align-items-center">
                <div class="col">
                    <div class="counterup__inner d-flex align-items-center">
                        <div class="counterup__items text-center">
                            <h2 class="counterup__number"> <span class="js-counter" data-count="9">9</span>+</h2>
                            <h5 class="counterup__subtitle"> Year of Experience</h5>
                        </div>
                        <div class="counterup__items text-center">
                            <h2 class="counterup__number"> <span class="js-counter" data-count="13">13</span>K</h2>
                            <h5 class="counterup__subtitle"> Land Properties</h5>
                        </div>
                        <div class="counterup__items text-center">
                            <h2 class="counterup__number"> <span class="js-counter" data-count="15">15</span>+</h2>
                            <h5 class="counterup__subtitle"> Partners</h5>
                        </div>
                        <div class="counterup__items text-center">
                            <h2 class="counterup__number"> <span class="js-counter" data-count="120">120</span>+</h2>
                            <h5 class="counterup__subtitle"> Agents</h5>
                        </div>
                        <img class="shape__position" src="assets/img/other/shape1.png" alt="img">
                        <img class="shape__position2" src="assets/img/other/shape2.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End counterup banner section -->

    <!-- Call action section -->
    <section class="call__action--section section--padding" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
        <div class="container">
            <div class="call__action--container">
                <div class="call__action--inner d-flex align-items-center justify-content-between">
                    <h2 class="call__action--title">Find Local Real estate agents</h2>
                    <div class="call__action--right d-flex align-items-center">
                        <div class="call__action--info d-flex align-items-center">
                            <span class="call__action--icon">
                                <svg width="36" height="29" viewBox="0 0 36 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_545)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3068 17.1114L31.1206 20.7877C33.2472 21.9346 30.8923 24.5371 28.982 25.9993C20.5418 32.4577 -1.18891 11.343 5.51137 3.09162C7.01925 1.23441 9.67601 -1.07127 10.8511 1.00439L14.6177 7.65474C14.9646 8.26739 14.7386 8.92125 14.3061 9.47891L12.9491 11.2291C12.5437 11.7524 12.5182 12.4332 12.8823 12.9843C14.5004 15.4301 16.3402 17.2256 18.8462 18.8053C19.411 19.1608 20.1085 19.1359 20.6447 18.74L22.4378 17.4156C23.0093 16.9934 23.6791 16.7729 24.3068 17.1115L24.3068 17.1114Z" fill="currentColor" />
                                        <path d="M30.6793 12.719C30.683 13.1155 31.0149 13.4351 31.4219 13.4313C31.8289 13.4285 32.1556 13.1037 32.1525 12.7065C32.0864 5.78063 26.2294 0.064642 19.1333 1.89285e-05C18.7271 -0.00282808 18.3943 0.315846 18.3906 0.713108C18.3877 1.1096 18.7142 1.43436 19.1213 1.43796C25.4103 1.49433 30.6206 6.58011 30.6794 12.7188L30.6793 12.719Z" fill="currentColor" />
                                        <path d="M27.1166 12.6865C27.1203 13.083 27.4531 13.4026 27.8593 13.3988C28.2663 13.396 28.593 13.0712 28.5899 12.674C28.5427 7.65961 24.3045 3.52373 19.1665 3.47757C18.7603 3.47396 18.4275 3.7934 18.4238 4.18988C18.4209 4.58713 18.7474 4.91186 19.1545 4.91473C23.485 4.9544 27.0764 8.45904 27.1162 12.6865H27.1166Z" fill="currentColor" />
                                        <path d="M23.5543 12.654C23.5572 13.0505 23.89 13.3701 24.297 13.3663C24.7032 13.3634 25.0307 13.0387 25.0268 12.6414C24.9974 9.53841 22.3791 6.98327 19.1997 6.95412C18.7935 6.95127 18.4607 7.26995 18.4571 7.66721C18.4541 8.06446 18.7806 8.38846 19.1877 8.39206C21.5597 8.41331 23.5316 10.3379 23.5542 12.6538L23.5543 12.654Z" fill="currentColor" />
                                        <path d="M4.49937 28.2945C4.48632 28.3011 4.47249 28.3059 4.45807 28.3089C4.44405 28.3123 4.42944 28.3142 4.41444 28.3142C4.36867 28.3142 4.33224 28.3019 4.30536 28.277C4.27887 28.2518 4.26562 28.2178 4.26562 28.1753C4.26562 28.1328 4.27887 28.0992 4.30536 28.0743C4.33224 28.0496 4.36867 28.0371 4.41444 28.0371C4.42944 28.0371 4.44405 28.039 4.45807 28.0424C4.47249 28.0455 4.48632 28.0504 4.49937 28.0568V28.1123C4.48573 28.1032 4.47249 28.0967 4.45963 28.0925C4.44717 28.0885 4.43392 28.0865 4.4199 28.0865C4.39496 28.0865 4.37509 28.0946 4.36068 28.1108C4.34607 28.1265 4.33886 28.148 4.33886 28.1753C4.33886 28.2032 4.34607 28.225 4.36068 28.2406C4.37509 28.2563 4.39496 28.2641 4.4199 28.2641C4.43392 28.2641 4.44717 28.2622 4.45963 28.258C4.47249 28.2541 4.48573 28.2478 4.49937 28.2391V28.2945Z" fill="currentColor" />
                                        <path d="M5.31966 28.0508V28.1077H5.38744V28.1533H5.31966V28.2383C5.31966 28.248 5.32141 28.2546 5.32511 28.258C5.32862 28.2611 5.33621 28.2626 5.3477 28.2626H5.38121V28.3082H5.32511C5.29901 28.3082 5.2807 28.3028 5.26979 28.2922C5.25888 28.2816 5.25343 28.2637 5.25343 28.2383V28.1533H5.2207V28.1077H5.25343V28.0508L5.31966 28.0508Z" fill="currentColor" />
                                        <path d="M5.82126 28.1381V28.0303H5.88749V28.3089H5.82126V28.2801C5.8123 28.2918 5.80256 28.3004 5.79166 28.3059C5.78075 28.3114 5.76789 28.3142 5.75348 28.3142C5.72796 28.3142 5.70712 28.3043 5.69115 28.2846C5.67498 28.2649 5.66699 28.2396 5.66699 28.2087C5.66699 28.1779 5.67498 28.1525 5.69115 28.1328C5.70712 28.113 5.72796 28.1032 5.75348 28.1032C5.76789 28.1032 5.78075 28.106 5.79166 28.1115C5.80256 28.1172 5.8123 28.1259 5.82126 28.1381ZM5.77841 28.2679C5.79243 28.2679 5.80295 28.263 5.81035 28.2527C5.81756 28.2427 5.82126 28.228 5.82126 28.2087C5.82126 28.1895 5.81756 28.1751 5.81035 28.1654C5.80295 28.1554 5.79243 28.1502 5.77841 28.1502C5.76439 28.1502 5.75348 28.1554 5.74569 28.1654C5.73828 28.1751 5.73478 28.1895 5.73478 28.2087C5.73478 28.228 5.73828 28.2427 5.74569 28.2527C5.75348 28.263 5.76439 28.2679 5.77841 28.2679Z" fill="currentColor" />
                                        <path d="M6.19013 28.2679C6.20416 28.2679 6.21468 28.263 6.22208 28.2527C6.22987 28.2427 6.23377 28.228 6.23377 28.2087C6.23377 28.1895 6.22987 28.1751 6.22208 28.1654C6.21468 28.1554 6.20416 28.1502 6.19013 28.1502C6.17611 28.1502 6.1652 28.1554 6.15741 28.1654C6.15001 28.1757 6.1465 28.1901 6.1465 28.2087C6.1465 28.228 6.15001 28.2427 6.15741 28.2527C6.1652 28.263 6.17611 28.2679 6.19013 28.2679ZM6.1465 28.1381C6.15527 28.1259 6.1652 28.1172 6.17611 28.1115C6.18741 28.106 6.20026 28.1032 6.21429 28.1032C6.23961 28.1032 6.26045 28.113 6.27662 28.1328C6.29318 28.1525 6.30155 28.1779 6.30155 28.2087C6.30155 28.2396 6.29318 28.2649 6.27662 28.2846C6.26045 28.3043 6.23961 28.3142 6.21429 28.3142C6.20026 28.3142 6.18741 28.3114 6.17611 28.3059C6.1652 28.3004 6.15527 28.2918 6.1465 28.2801V28.3089H6.08105V28.0303H6.1465V28.1381Z" fill="currentColor" />
                                        <path d="M6.72754 28.0413H6.79844V28.143H6.90285V28.0413H6.97375V28.3085H6.90285V28.1954H6.79844V28.3085H6.72754V28.0413Z" fill="currentColor" />
                                        <path d="M8.29036 28.0508V28.1077H8.35815V28.1533H8.29036V28.2383C8.29036 28.248 8.29211 28.2546 8.29581 28.258C8.29932 28.2611 8.30692 28.2626 8.31841 28.2626H8.35191V28.3082H8.29581C8.26971 28.3082 8.2514 28.3028 8.24049 28.2922C8.22958 28.2816 8.22413 28.2637 8.22413 28.2383V28.1533H8.19141V28.1077H8.22413V28.0508L8.29036 28.0508Z" fill="currentColor" />
                                        <path d="M9.08147 28.1867V28.3089H9.01525V28.2155C9.01525 28.1984 9.01466 28.1865 9.01369 28.1798C9.0131 28.1734 9.01174 28.1685 9.00979 28.1654C9.00707 28.1609 9.00356 28.1576 8.99888 28.1555C8.9946 28.1531 8.98992 28.1517 8.98486 28.1517C8.97084 28.1517 8.95993 28.1571 8.95214 28.1677C8.94434 28.1779 8.94045 28.192 8.94045 28.2102V28.3089H8.875V28.0303H8.94045V28.1381C8.95019 28.1259 8.96071 28.1172 8.97161 28.1115C8.98291 28.106 8.99538 28.1032 9.00901 28.1032C9.03278 28.1032 9.0507 28.1106 9.06277 28.1252C9.07524 28.1394 9.08147 28.1599 9.08147 28.1867Z" fill="#bf9839" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_545">
                                            <rect width="34.8356" height="28.06" fill="white" transform="translate(0.776367)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <p class="call__action--info__text">
                                <span>Phone Number</span>
                                <a href="tel:(+234) 703-035-7998">(+234) 703-035-7998</a>
                            </p>
                        </div>
                        <a class="call__action--btn solid__btn" href="contact.php">Reach out now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call action section -->

    <!-- Testimonial section -->
    <section class="testimonial__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-20" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <h3 class="section__heading--subtitle h5"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_6)">
                            <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                            <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Trusted Real estate Care
                </h3>
                <h2 class="section__heading--title">Feedback From Our Clients</h2>
            </div>
            <div class="testimonial__container position-relative" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                <div class="testimonial__inner testimonial__swiper--column2 swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial__card">
                                <div class="testimonial__card--top d-flex justify-content-between">
                                    <div class="testimonial__author d-flex align-items-center">
                                        <!-- <div class="testimonial__author--thumbnail">
                                            <img src="assets/img/other/testimonial-author-thumb3.png" alt="img">
                                        </div> -->
                                        <!-- <div class="testimonial__author--content">
                                            <h3 class="testimonial__author--name">Cameron Williamson</h3>
                                            <span class="testimonial__author--subtitle">Ceo & Founder</span>
                                        </div> -->
                                    </div>
                                    <span class="testimonial__icon"><svg width="56" height="41" viewBox="0 0 56 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8311 21.1016C17.9536 21.1016 18.0759 21.1354 18.1817 21.2039C18.3821 21.3311 18.4933 21.5575 18.4689 21.7902C18.1183 25.181 17.2177 28.3412 15.7918 31.1837C14.5318 33.6944 12.8821 35.8983 10.864 37.7716C20.7152 32.6251 24.7246 21.6445 23.3721 12.7732C22.5228 7.20455 19.1356 1.25311 12.1763 1.25311C6.17002 1.25308 1.28225 6.02976 1.28225 11.9008C1.28236 17.7707 6.16997 22.5474 12.1763 22.5474C14.0486 22.5473 15.8941 22.0753 17.5159 21.1821C17.6139 21.1277 17.723 21.1017 17.8311 21.1016L17.8311 21.1016ZM6.69995 40.7565C6.45388 40.7565 6.22235 40.6173 6.11549 40.39C5.98301 40.1038 6.08656 39.7655 6.35926 39.598C13.747 35.0813 16.2827 28.1824 17.053 22.8063C15.5225 23.4589 13.8584 23.8006 12.1765 23.8006C5.46212 23.8005 0 18.4615 0 11.9008C0.00010793 5.33901 5.4621 2.89626e-09 12.1765 2.89626e-09C15.527 -7.02862e-05 18.4723 1.27924 20.694 3.6986C22.7266 5.91116 24.0913 8.98545 24.64 12.5894C26.2563 23.1859 20.5827 36.6501 6.88693 40.7294C6.82457 40.7478 6.7611 40.7566 6.69997 40.7565L6.69995 40.7565Z" fill="#bf9839" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M48.9217 21.1017C49.0442 21.1017 49.1666 21.1354 49.2735 21.2039C49.4739 21.3311 49.584 21.5575 49.5607 21.7902C49.21 25.181 48.3084 28.3412 46.8825 31.1837C45.6226 33.6944 43.9739 35.8984 41.9558 37.7716C51.8048 32.6251 55.8152 21.6445 54.4628 12.7732C53.6136 7.20455 50.2274 1.25311 43.2682 1.25311C37.2607 1.25308 32.3741 6.02976 32.3741 11.9008C32.3742 17.7707 37.2607 22.5474 43.2682 22.5474C45.1394 22.5473 46.986 22.0753 48.6079 21.1821C48.7059 21.1277 48.8137 21.1017 48.9217 21.1017L48.9217 21.1017ZM37.7906 40.7565C37.5446 40.7565 37.313 40.6173 37.2073 40.39C37.0738 40.1039 37.1783 39.7656 37.4499 39.5981C44.8389 35.0814 47.3734 28.1824 48.1436 22.8063C46.6132 23.4589 44.9501 23.8006 43.2682 23.8006C36.5539 23.8005 31.0918 18.4615 31.0918 11.9008C31.0919 5.33901 36.5539 2.89626e-09 43.2682 2.89626e-09C46.6176 -7.02862e-05 49.5629 1.27924 51.7847 3.6986C53.8173 5.91116 55.1819 8.98545 55.7318 12.5883C57.347 23.1859 51.6734 36.6501 37.9776 40.7294C37.9153 40.7478 37.8529 40.7566 37.7906 40.7565V40.7565Z" fill="#bf9839" />
                                        </svg>
                                    </span>
                                </div>
                                <p class="testimonial__desc">Working with Royal Haven Homes and Lands was truly a game changer in my home-buying journey. From the very first consultation to the moment we closed, their team was professional, responsive, and incredibly knowledgeable about the local market. They took the time to understand my needs and preferences, guiding me through every step of the process with care and expertise. I was especially impressed with how smoothly they handled all the paperwork, negotiations, and inspections, ensuring there were no surprises along the way.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__card">
                                <div class="testimonial__card--top d-flex justify-content-between">
                                    <div class="testimonial__author d-flex align-items-center">
                                        <!-- <div class="testimonial__author--thumbnail">
                                            <img src="assets/img/other/testimonial-author-thumb2.png" alt="img">
                                        </div> -->
                                        <!-- <div class="testimonial__author--content">
                                            <h3 class="testimonial__author--name">Cameron Williamson</h3>
                                            <span class="testimonial__author--subtitle">Ceo & Founder</span>
                                        </div> -->
                                    </div>
                                    <span class="testimonial__icon"><svg width="56" height="41" viewBox="0 0 56 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8311 21.1016C17.9536 21.1016 18.0759 21.1354 18.1817 21.2039C18.3821 21.3311 18.4933 21.5575 18.4689 21.7902C18.1183 25.181 17.2177 28.3412 15.7918 31.1837C14.5318 33.6944 12.8821 35.8983 10.864 37.7716C20.7152 32.6251 24.7246 21.6445 23.3721 12.7732C22.5228 7.20455 19.1356 1.25311 12.1763 1.25311C6.17002 1.25308 1.28225 6.02976 1.28225 11.9008C1.28236 17.7707 6.16997 22.5474 12.1763 22.5474C14.0486 22.5473 15.8941 22.0753 17.5159 21.1821C17.6139 21.1277 17.723 21.1017 17.8311 21.1016L17.8311 21.1016ZM6.69995 40.7565C6.45388 40.7565 6.22235 40.6173 6.11549 40.39C5.98301 40.1038 6.08656 39.7655 6.35926 39.598C13.747 35.0813 16.2827 28.1824 17.053 22.8063C15.5225 23.4589 13.8584 23.8006 12.1765 23.8006C5.46212 23.8005 0 18.4615 0 11.9008C0.00010793 5.33901 5.4621 2.89626e-09 12.1765 2.89626e-09C15.527 -7.02862e-05 18.4723 1.27924 20.694 3.6986C22.7266 5.91116 24.0913 8.98545 24.64 12.5894C26.2563 23.1859 20.5827 36.6501 6.88693 40.7294C6.82457 40.7478 6.7611 40.7566 6.69997 40.7565L6.69995 40.7565Z" fill="#bf9839" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M48.9217 21.1017C49.0442 21.1017 49.1666 21.1354 49.2735 21.2039C49.4739 21.3311 49.584 21.5575 49.5607 21.7902C49.21 25.181 48.3084 28.3412 46.8825 31.1837C45.6226 33.6944 43.9739 35.8984 41.9558 37.7716C51.8048 32.6251 55.8152 21.6445 54.4628 12.7732C53.6136 7.20455 50.2274 1.25311 43.2682 1.25311C37.2607 1.25308 32.3741 6.02976 32.3741 11.9008C32.3742 17.7707 37.2607 22.5474 43.2682 22.5474C45.1394 22.5473 46.986 22.0753 48.6079 21.1821C48.7059 21.1277 48.8137 21.1017 48.9217 21.1017L48.9217 21.1017ZM37.7906 40.7565C37.5446 40.7565 37.313 40.6173 37.2073 40.39C37.0738 40.1039 37.1783 39.7656 37.4499 39.5981C44.8389 35.0814 47.3734 28.1824 48.1436 22.8063C46.6132 23.4589 44.9501 23.8006 43.2682 23.8006C36.5539 23.8005 31.0918 18.4615 31.0918 11.9008C31.0919 5.33901 36.5539 2.89626e-09 43.2682 2.89626e-09C46.6176 -7.02862e-05 49.5629 1.27924 51.7847 3.6986C53.8173 5.91116 55.1819 8.98545 55.7318 12.5883C57.347 23.1859 51.6734 36.6501 37.9776 40.7294C37.9153 40.7478 37.8529 40.7566 37.7906 40.7565V40.7565Z" fill="#bf9839" />
                                        </svg>
                                    </span>
                                </div>
                                <p class="testimonial__desc">I cannot recommend Royal Haven Homes and Lands Integrated Services highly enough! From start to finish, they exceeded all my expectations. Their dedication and expertise made selling my home a breeze. They provided excellent market insights, staged the property beautifully, and marketed it so effectively that we had multiple offers within the first week. Their negotiation skills were top-notch, and they always kept my best interests at heart. Communication was seamless—any question I had was answered promptly and clearly.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__card">
                                <div class="testimonial__card--top d-flex justify-content-between">
                                    <div class="testimonial__author d-flex align-items-center">
                                        <!-- <div class="testimonial__author--thumbnail">
                                            <img src="assets/img/other/testimonial-author-thumb.png" alt="img">
                                        </div>
                                        <div class="testimonial__author--content">
                                            <h3 class="testimonial__author--name">Cameron Williamson</h3>
                                            <span class="testimonial__author--subtitle">Ceo & Founder</span>
                                        </div> -->
                                    </div>
                                    <span class="testimonial__icon"><svg width="56" height="41" viewBox="0 0 56 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8311 21.1016C17.9536 21.1016 18.0759 21.1354 18.1817 21.2039C18.3821 21.3311 18.4933 21.5575 18.4689 21.7902C18.1183 25.181 17.2177 28.3412 15.7918 31.1837C14.5318 33.6944 12.8821 35.8983 10.864 37.7716C20.7152 32.6251 24.7246 21.6445 23.3721 12.7732C22.5228 7.20455 19.1356 1.25311 12.1763 1.25311C6.17002 1.25308 1.28225 6.02976 1.28225 11.9008C1.28236 17.7707 6.16997 22.5474 12.1763 22.5474C14.0486 22.5473 15.8941 22.0753 17.5159 21.1821C17.6139 21.1277 17.723 21.1017 17.8311 21.1016L17.8311 21.1016ZM6.69995 40.7565C6.45388 40.7565 6.22235 40.6173 6.11549 40.39C5.98301 40.1038 6.08656 39.7655 6.35926 39.598C13.747 35.0813 16.2827 28.1824 17.053 22.8063C15.5225 23.4589 13.8584 23.8006 12.1765 23.8006C5.46212 23.8005 0 18.4615 0 11.9008C0.00010793 5.33901 5.4621 2.89626e-09 12.1765 2.89626e-09C15.527 -7.02862e-05 18.4723 1.27924 20.694 3.6986C22.7266 5.91116 24.0913 8.98545 24.64 12.5894C26.2563 23.1859 20.5827 36.6501 6.88693 40.7294C6.82457 40.7478 6.7611 40.7566 6.69997 40.7565L6.69995 40.7565Z" fill="#bf9839" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M48.9217 21.1017C49.0442 21.1017 49.1666 21.1354 49.2735 21.2039C49.4739 21.3311 49.584 21.5575 49.5607 21.7902C49.21 25.181 48.3084 28.3412 46.8825 31.1837C45.6226 33.6944 43.9739 35.8984 41.9558 37.7716C51.8048 32.6251 55.8152 21.6445 54.4628 12.7732C53.6136 7.20455 50.2274 1.25311 43.2682 1.25311C37.2607 1.25308 32.3741 6.02976 32.3741 11.9008C32.3742 17.7707 37.2607 22.5474 43.2682 22.5474C45.1394 22.5473 46.986 22.0753 48.6079 21.1821C48.7059 21.1277 48.8137 21.1017 48.9217 21.1017L48.9217 21.1017ZM37.7906 40.7565C37.5446 40.7565 37.313 40.6173 37.2073 40.39C37.0738 40.1039 37.1783 39.7656 37.4499 39.5981C44.8389 35.0814 47.3734 28.1824 48.1436 22.8063C46.6132 23.4589 44.9501 23.8006 43.2682 23.8006C36.5539 23.8005 31.0918 18.4615 31.0918 11.9008C31.0919 5.33901 36.5539 2.89626e-09 43.2682 2.89626e-09C46.6176 -7.02862e-05 49.5629 1.27924 51.7847 3.6986C53.8173 5.91116 55.1819 8.98545 55.7318 12.5883C57.347 23.1859 51.6734 36.6501 37.9776 40.7294C37.9153 40.7478 37.8529 40.7566 37.7906 40.7565V40.7565Z" fill="#bf9839" />
                                        </svg>
                                    </span>
                                </div>
                                <p class="testimonial__desc">Choosing Royal Haven Homes was the best decision we made when purchasing our Landed property in Enugu State. Their team was incredibly patient, understanding, and always available to answer our questions. They took the time to walk us through different neighborhoods, explaining the pros and cons of each, which really helped us make an informed decision. What stood out the most was how they never pushed us into a decision but instead made sure we were 100% confident and comfortable with our choice. </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper__nav--btn swiper-button-disabled swiper-button-prev">
                    <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.223772 5.27955L5.27967 0.223543C5.42399 0.0792188 5.61635 0 5.82145 0C6.02678 0 6.21902 0.0793326 6.36335 0.223543L6.82238 0.682693C6.96659 0.82679 7.04604 1.01926 7.04604 1.22448C7.04604 1.42958 6.96659 1.62854 6.82238 1.77264L3.87285 4.72866H13.2437C13.6662 4.72866 14 5.05942 14 5.48203V6.13115C14 6.55376 13.6662 6.91788 13.2437 6.91788H3.83939L6.82227 9.8904C6.96648 10.0347 7.04593 10.222 7.04593 10.4272C7.04593 10.6322 6.96648 10.8221 6.82227 10.9663L6.36323 11.424C6.21891 11.5683 6.02667 11.647 5.82134 11.647C5.61623 11.647 5.42388 11.5673 5.27955 11.423L0.223659 6.3671C0.0789928 6.22232 -0.000566483 6.02905 1.90735e-06 5.82361C-0.000452995 5.61748 0.0789928 5.4241 0.223772 5.27955Z" fill="currentColor" />
                    </svg>
                </div>
                <div class="swiper__nav--btn swiper-button-next">
                    <svg width="16" height="13" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.7762 5.27955L8.72033 0.223543C8.57601 0.0792188 8.38365 0 8.17855 0C7.97322 0 7.78098 0.0793326 7.63665 0.223543L7.17762 0.682693C7.03341 0.82679 6.95396 1.01926 6.95396 1.22448C6.95396 1.42958 7.03341 1.62854 7.17762 1.77264L10.1272 4.72866H0.756335C0.333835 4.72866 0 5.05942 0 5.48203V6.13115C0 6.55376 0.333835 6.91788 0.756335 6.91788H10.1606L7.17773 9.8904C7.03352 10.0347 6.95407 10.222 6.95407 10.4272C6.95407 10.6322 7.03352 10.8221 7.17773 10.9663L7.63677 11.424C7.78109 11.5683 7.97333 11.647 8.17866 11.647C8.38377 11.647 8.57612 11.5673 8.72045 11.423L13.7763 6.3671C13.921 6.22232 14.0006 6.02905 14 5.82361C14.0005 5.61748 13.921 5.4241 13.7762 5.27955Z" fill="currentColor" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section -->

    <!-- Building Amenities section -->
    <section class="building__amenities--section section--padding" id="materials">
        <div class="container">
            <div class="section__heading text-center mb-50" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                <h3 class="section__heading--subtitle h5">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_6)">
                            <path d="M9.00021 4.72925L2.5806 10.0215C2.5806 10.029 2.57872 10.04 2.57497 10.055C2.57129 10.0698 2.56934 10.0806 2.56934 10.0883V15.4473C2.56934 15.6408 2.64008 15.8085 2.78152 15.9497C2.92292 16.091 3.09037 16.1621 3.2839 16.1621H7.571V11.8747H10.4295V16.1622H14.7165C14.91 16.1622 15.0777 16.0913 15.2189 15.9497C15.3603 15.8086 15.4313 15.6408 15.4313 15.4473V10.0883C15.4313 10.0586 15.4272 10.0361 15.4201 10.0215L9.00021 4.72925Z" fill="#bf9839" />
                            <path d="M17.8758 8.81572L15.4309 6.78374V2.2285C15.4309 2.12437 15.3974 2.03872 15.3302 1.9717C15.2636 1.90475 15.178 1.87128 15.0736 1.87128H12.93C12.8258 1.87128 12.7401 1.90475 12.6731 1.9717C12.6062 2.03872 12.5727 2.1244 12.5727 2.2285V4.4056L9.8486 2.12792C9.61069 1.93439 9.3278 1.83765 9.00026 1.83765C8.67275 1.83765 8.3899 1.93439 8.15175 2.12792L0.124063 8.81572C0.0496462 8.87516 0.00885955 8.95517 0.00127316 9.05567C-0.00627412 9.15609 0.0197308 9.2438 0.079366 9.31818L0.771565 10.1444C0.831201 10.2113 0.909254 10.2523 1.00604 10.2673C1.09539 10.2748 1.18475 10.2486 1.27411 10.1891L9.00002 3.74687L16.726 10.1891C16.7857 10.241 16.8637 10.2669 16.9605 10.2669H16.994C17.0907 10.2522 17.1686 10.211 17.2285 10.1442L17.9208 9.31814C17.9803 9.2436 18.0064 9.15605 17.9987 9.05551C17.991 8.95528 17.9501 8.87527 17.8758 8.81572Z" fill="#bf9839" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Building / Construction
                </h3>
                <h2 class="section__heading--title">Building Materials Supply</h2>
            </div>
            <div class="building__amenities--inner d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/10393/10393273.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">01</span>
                        <h3 class="amenities__title">Steel/Rods</h3>
                        <p class="amenities__desc">Durable rods and steel for successful construction projects.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/2716/2716856.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">02</span>
                        <h3 class="amenities__title">Cement</h3>
                        <p class="amenities__desc">Well refined cement for your construction needs.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/1887/1887007.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">03</span>
                        <h3 class="amenities__title">Blocks</h3>
                        <p class="amenities__desc">Concrete blocks produced to the standard construction industry</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/12888/12888218.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">04</span>
                        <h3 class="amenities__title">Woods</h3>
                        <p class="amenities__desc">Top graded wooding materials for sustainable construction experience.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/11387/11387346.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">05</span>
                        <h3 class="amenities__title">Plumbering materials</h3>
                        <p class="amenities__desc">Risk free plumbing materials for all round purposes.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/9873/9873603.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">06</span>
                        <h3 class="amenities__title">Sand, stones and gravel</h3>
                        <p class="amenities__desc">Construction stones and gravel for excellent structure.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/3857/3857533.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">07</span>
                        <h3 class="amenities__title">Wiring</h3>
                        <p class="amenities__desc">Problem free wires for your residential and commercial wiring.</p>
                    </div>
                </div>
                <div class="amenities__box">
                    <div class="amenities__icone text-right">
                        <span class="d-flex justify-content-between align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/11090/11090840.png" class="mx-auto" alt="" style="width: 40%;">
                        </span>
                    </div>
                    <div class="amenities__content">
                        <span class="amenities__count--number">08</span>
                        <h3 class="amenities__title">Circuit breakers,switches and outlets.</h3>
                        <p class="amenities__desc">Safety electrical fittings for a polished electrical system.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a class="solid__btn mt-5 " href="order.php">Place Order</a>
            </div>
        </div>
    </section>
    <!-- Building Amenities section -->

    <!-- Brand Logo section -->
    <div class="brand__logo--aera space-y-partners" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
        <div class="container">
            <div class="brand__logo--inner  brand__logo--column6 swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="brand__logo--items partner-logo">
                            <img src="assets/img/main_pics/partner2.jpg" alt="img" class="img-fluid">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__logo--items">
                            <img src="assets/img/main_pics/partner3.jpg" alt="img" class="img-fluid">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__logo--items partner-190">
                            <img src="assets/img/main_pics/partner6.jpg" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="brand__logo--items ">
                            <img src="assets/img/main_pics/partner7.jpg" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="brand__logo--items partner-190">
                            <img src="assets/img/main_pics/IMG-20220208-WA0074.jpg" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="brand__logo--items partner-190">
                            <img src="assets/img/main_pics/Orange Minimalist Real Estate Logo_20240927_123805_0000.png" alt="img">
                        </div>
                    </div>
                    <!-- <div class="swiper-slide">
                        <div class="brand__logo--items">
                            <img src="assets/img/logo/brand1.png" alt="img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__logo--items">
                            <img src="assets/img/logo/brand2.png" alt="img">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo section -->

    <?php include 'inc/footer.php' ?>

</main>

<!-- Quickview Wrapper -->
<div class="modal fade" id="advanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog advance__filter--main--wrapper modal-dialog-centered">
        <div class="modal-content advance__filter--main__content">
            <div class="advance__filter--header d-flex justify-content-between align-items-center">
                <h2 class="advance__filter--header__title">More Filter</h2>
                <button type="button" class="btn-close quickview__close--btn" data-bs-dismiss="modal" aria-label="Close">✕</button>
            </div>
            <div class="modal-body advance__filter--details">
                <div class="advance__price--range modal__price--range">
                    <h3 class="advance__price--range__title">Filter By Price</h3>
                    <div class="advance__filter--price advance__price--filter">
                        <div class="widget__price--filtering">
                            <div class="price-input">
                                <input type="number" class="input-min" value="2500">
                                <div class="separator">-</div>
                                <input type="number" class="input-max" value="7500">
                            </div>
                            <div class="price-slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                            </div>
                            <button class="advance__filter--btn solid__btn">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="advance__apeartment--area">
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Type</label>
                        <div class="select">
                            <select class="advance__apeartment--select">
                                <option selected="" value="1">Apartments</option>
                                <option value="2">Office</option>
                                <option value="3">Condo</option>
                                <option value="4">Apartment</option>
                                <option value="5">House</option>
                                <option value="6">Single Family</option>
                                <option value="7">Land</option>
                            </select>
                        </div>
                    </div>
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Property ID</label>
                        <input class="advance__apeartment--input__field" placeholder="Th26157096" type="text">
                    </div>
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Bedrooms</label>
                        <div class="select">
                            <select class="advance__apeartment--select">
                                <option selected="" value="1">Bedrooms</option>
                                <option value="2">1+</option>
                                <option value="3">2+</option>
                                <option value="4">3+</option>
                                <option value="5">4+</option>
                                <option value="6">5+</option>
                                <option value="7">6+</option>
                            </select>
                        </div>
                    </div>
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Bathrooms</label>
                        <div class="select">
                            <select class="advance__apeartment--select">
                                <option selected="" value="1">Bathrooms</option>
                                <option value="2">1+</option>
                                <option value="3">2+</option>
                                <option value="4">3+</option>
                                <option value="5">4+</option>
                                <option value="6">5+</option>
                                <option value="7">6+</option>
                            </select>
                        </div>
                    </div>
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Year built</label>
                        <div class="select">
                            <select class="advance__apeartment--select">
                                <option selected="" value="1">Year built</option>
                                <option value="2">2020</option>
                                <option value="3">2021</option>
                                <option value="4">2022</option>
                                <option value="5">2023</option>
                                <option value="6">2024</option>
                                <option value="7">2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="advance__apeartment--list">
                        <label class="advance__apeartment--label">Location</label>
                        <div class="select">
                            <select class="advance__apeartment--select">
                                <option selected="" value="1">Canada</option>
                                <option value="2">United</option>
                                <option value="3">Adana</option>
                                <option value="4">Antalya</option>
                                <option value="5">Bursa</option>
                                <option value="6">Gaziantep</option>
                                <option value="7">New York</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="interior__amenities--area">
                    <h3 class="interior__amenitie--title">Interior Amenities</h3>
                    <div class="advance__apeartment--iner d-flex">
                        <ul class="interior__amenities--check">
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check1">Air Conditioning</label>
                                <input class="interior__amenities--check__input" id="check1" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check2">Swimming Pool</label>
                                <input class="interior__amenities--check__input" id="check2" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check3">Outdoor Shower</label>
                                <input class="interior__amenities--check__input" id="check3" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check4">Lawn</label>
                                <input class="interior__amenities--check__input" id="check4" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                        </ul>
                        <ul class="interior__amenities--check">
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check5">Barbeque</label>
                                <input class="interior__amenities--check__input" id="check5" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check6">Washer</label>
                                <input class="interior__amenities--check__input" id="check6" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check7">Microwave</label>
                                <input class="interior__amenities--check__input" id="check7" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check8">Dryer</label>
                                <input class="interior__amenities--check__input" id="check8" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                        </ul>
                        <ul class="interior__amenities--check">
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check9">TV Cable</label>
                                <input class="interior__amenities--check__input" id="check9" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check10">Refrigerator</label>
                                <input class="interior__amenities--check__input" id="check10" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check11">Laundry</label>
                                <input class="interior__amenities--check__input" id="check11" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check12">Gym</label>
                                <input class="interior__amenities--check__input" id="check12" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                        </ul>
                        <ul class="interior__amenities--check">
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check13">Front yard</label>
                                <input class="interior__amenities--check__input" id="check13" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check14">WiFi</label>
                                <input class="interior__amenities--check__input" id="check14" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check15">Sauna</label>
                                <input class="interior__amenities--check__input" id="check15" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                            <li class="interior__amenities--check__list">
                                <label class="interior__amenities--check__label" for="check16">Wine cellar</label>
                                <input class="interior__amenities--check__input" id="check16" type="checkbox">
                                <span class="interior__amenities--checkmark"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="advance__filter--footer d-flex justify-content-between align-items-center">
                    <button class="advance__filter--reset__btn">Reset all filters</button>
                    <button class="advance__filter--search__btn solid__btn">Search <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.60519 0C2.96319 0 0 2.96338 0 6.60562C0 10.2481 2.96319 13.2112 6.60519 13.2112C10.2474 13.2112 13.2104 10.2481 13.2104 6.60562C13.2104 2.96338 10.2474 0 6.60519 0ZM6.60519 11.9918C3.6355 11.9918 1.21942 9.57553 1.21942 6.60565C1.21942 3.63576 3.6355 1.2195 6.60519 1.2195C9.57487 1.2195 11.991 3.63573 11.991 6.60562C11.991 9.5755 9.57487 11.9918 6.60519 11.9918Z" fill="white" />
                            <path d="M14.8206 13.9597L11.325 10.4638C11.0868 10.2256 10.701 10.2256 10.4628 10.4638C10.2246 10.7018 10.2246 11.088 10.4628 11.326L13.9585 14.8219C14.0776 14.941 14.2335 15.0006 14.3896 15.0006C14.5454 15.0006 14.7015 14.941 14.8206 14.8219C15.0588 14.5839 15.0588 14.1977 14.8206 13.9597Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quickview Wrapper End -->

<!-- Scroll top bar -->
<button id="scroll__top">
    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
    </svg>
</button>

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