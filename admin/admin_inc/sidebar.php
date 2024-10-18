<!-- Start Offcanvas header menu -->
<div class="offcanvas__header">
    <div class="offcanvas__inner">
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="dashboard.php">
                <img class="light__logo" src="assets/img/logo/image-178x80.png" alt="Logo-img" width="158" height="36">
                <img class="dark__logo" src="assets/img/logo/image-178x80.png" alt="Logo-img" width="158" height="36">
            </a>
            <button class="offcanvas__close--btn" data-offcanvas>close</button>
        </div>

        <nav class="offcanvas__menu">
            <ul class="offcanvas__menu_ul">
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="../index.php">Home</a>
                </li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="../listing.php">Listing</a>
                </li>
                <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="project.php">Properties</a></li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- End Offcanvas header menu -->

<!-- Start serch box area -->
<div class="predictive__search--box">
    <div class="predictive__search--box__inner">
        <h2 class="predictive__search--title">Search Products</h2>
        <form class="predictive__search--form" action="#">
            <label>
                <input class="predictive__search--input" placeholder="Search Here" type="text">
            </label>
            <button class="predictive__search--button" aria-label="search button"><svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512">
                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                </svg> </button>
        </form>
    </div>
    <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
        <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443" viewBox="0 0 512 512">
            <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368" />
        </svg>
    </button>
</div>
<!-- End serch box area -->

<!-- Dashboard sidebar -->
<div class="dashboard__sidebar">
    <div class="main__logo logo-desktop-none">
        <h1 class="main__logo--title"><a class="main__logo--link" href="dashboard.php">
                <img class="main__logo--img desktop light__logo" src="assets/img/logo/image-178x80.png" alt="logo-img">
                <img class="main__logo--img desktop dark__logo" src="assets/img/logo/image-178x80.png" alt="logo-img">
                <img class="main__logo--img mobile" src="assets/img/logo/image-178x80.png" alt="logo-img">
            </a></h1>
    </div>
    <div class="dashboard__sidebar--inner">
        <ul class="sidebar__menu" id="accordionExample">
            <li class="sidebar__menu--items"><a class="sidebar__menu--link active" href="dashboard.php"><svg class="sidebar__menu--icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.300049 1.40005C0.300049 1.10831 0.415941 0.828521 0.622231 0.622231C0.828521 0.415941 1.10831 0.300049 1.40005 0.300049H14.6C14.8918 0.300049 15.1716 0.415941 15.3779 0.622231C15.5842 0.828521 15.7 1.10831 15.7 1.40005V3.60005C15.7 3.89179 15.5842 4.17158 15.3779 4.37787C15.1716 4.58416 14.8918 4.70005 14.6 4.70005H1.40005C1.10831 4.70005 0.828521 4.58416 0.622231 4.37787C0.415941 4.17158 0.300049 3.89179 0.300049 3.60005V1.40005ZM0.300049 8.00005C0.300049 7.70831 0.415941 7.42852 0.622231 7.22223C0.828521 7.01594 1.10831 6.90005 1.40005 6.90005H8.00005C8.29179 6.90005 8.57158 7.01594 8.77787 7.22223C8.98416 7.42852 9.10005 7.70831 9.10005 8.00005V14.6C9.10005 14.8918 8.98416 15.1716 8.77787 15.3779C8.57158 15.5842 8.29179 15.7 8.00005 15.7H1.40005C1.10831 15.7 0.828521 15.5842 0.622231 15.3779C0.415941 15.1716 0.300049 14.8918 0.300049 14.6V8.00005ZM12.4 6.90005C12.1083 6.90005 11.8285 7.01594 11.6222 7.22223C11.4159 7.42852 11.3 7.70831 11.3 8.00005V14.6C11.3 14.8918 11.4159 15.1716 11.6222 15.3779C11.8285 15.5842 12.1083 15.7 12.4 15.7H14.6C14.8918 15.7 15.1716 15.5842 15.3779 15.3779C15.5842 15.1716 15.7 14.8918 15.7 14.6V8.00005C15.7 7.70831 15.5842 7.42852 15.3779 7.22223C15.1716 7.01594 14.8918 6.90005 14.6 6.90005H12.4Z" fill="currentColor" />
                    </svg>
                    <span class="sidebar__menu--text"> Dashboard</span>
                </a>
            </li>
            <li class="sidebar__menu--items"><a class="sidebar__menu--link" href="create-listing.php"><svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99996 18.3334C14.5833 18.3334 18.3333 14.5834 18.3333 10.0001C18.3333 5.41675 14.5833 1.66675 9.99996 1.66675C5.41663 1.66675 1.66663 5.41675 1.66663 10.0001C1.66663 14.5834 5.41663 18.3334 9.99996 18.3334Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.66663 10H13.3333" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 13.3334V6.66675" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="sidebar__menu--text"> Create Listing</span>
                </a>
            </li>
            <li class="sidebar__menu--items"><a class="sidebar__menu--link" href="property_category.php"><svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99996 18.3334C14.5833 18.3334 18.3333 14.5834 18.3333 10.0001C18.3333 5.41675 14.5833 1.66675 9.99996 1.66675C5.41663 1.66675 1.66663 5.41675 1.66663 10.0001C1.66663 14.5834 5.41663 18.3334 9.99996 18.3334Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.66663 10H13.3333" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 13.3334V6.66675" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="sidebar__menu--text">Add Category</span>
                </a>
            </li>
            <li class="sidebar__menu--items">
                <label class="sidebar__menu--title">Manage Listings</label>
            </li>
            <li class="sidebar__menu--items dropdown__items">
                <a class="sidebar__menu--link dropdown__link--active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.51663 2.36664L3.02496 5.86664C2.27496 6.44997 1.66663 7.69164 1.66663 8.63331V14.8083C1.66663 16.7416 3.24163 18.325 5.17496 18.325H14.825C16.7583 18.325 18.3333 16.7416 18.3333 14.8166V8.74997C18.3333 7.74164 17.6583 6.44997 16.8333 5.87497L11.6833 2.26664C10.5166 1.44997 8.64163 1.49164 7.51663 2.36664Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 14.9917V12.4917" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="sidebar__menu--text">My Properties</span>
                    <svg class="sidebar__menu--link__arrow" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.99999 3.02344L1.87499 7.14844L0.696655 5.9701L5.99999 0.666771L11.3033 5.9701L10.125 7.14844L5.99999 3.02344Z" fill="currentColor" />
                    </svg>
                </a>
                <ul class="sidebar__dropdown--menu accordion-collapse collapse show" id="collapseOne">
                    <li class="sidebar__dropdown--menu__items"><a class="sidebar__dropdown--menu__link" href="property-listings.php">Landed Properties</a></li>
                    <li class="sidebar__dropdown--menu__items"><a class="sidebar__dropdown--menu__link" href="property-buildings.php">Building Properties</a></li>
                    <li class="sidebar__dropdown--menu__items"><a class="sidebar__dropdown--menu__link" href="property-cars.php">Cars</a></li>
                </ul>
            </li>

            <li class="sidebar__menu--items">
                <a class="sidebar__menu--link logout color-accent-2" href="../functions/logout.php">
                    <svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41663 6.29995C7.67496 3.29995 9.21663 2.07495 12.5916 2.07495H12.7C16.425 2.07495 17.9166 3.56662 17.9166 7.29162V12.725C17.9166 16.45 16.425 17.9416 12.7 17.9416H12.5916C9.24163 17.9416 7.69996 16.7333 7.42496 13.7833" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.5001 10H3.01672" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.87504 7.20825L2.08337 9.99992L4.87504 12.7916" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="sidebar__menu--text"> Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Dashboard sidebar .\ -->