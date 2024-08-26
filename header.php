<!-- header-area -->
<header>
    <div class="tg-header__area transparent-header" id="sticky-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="index.php"><img alt="Logo" src="./img/logo.png" /></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="about-us.php">ABOUT US</a></li>

                                    <li><a href="contact.php">contact</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action d-none d-md-block">
                                <ul class="list-wrap">
                                    <!-- <li class="search">
                                        <a href="javascript:void(0)"><i class="flaticon-search-1"></i></a>
                                    </li> -->
                                    <li class="header-btn">
                                        <a class="tg-border-btn"
                                            href="<?php echo isset($_SESSION['user_id']) ? 'logout.php' : 'login.php'; ?>">
                                            <svg fill="none" preserveaspectratio="none" viewBox="0 0 157 48">
                                                <path clip-rule="evenodd"
                                                    d="M131.75 2L155.75 25L131.75 47L148.75 24L131.75 2Z"
                                                    fill="currentColor" fill-rule="evenodd"></path>
                                                <path clip-rule="evenodd" d="M25 1L1 24.5111L25 47L8 23.4889L25 1Z"
                                                    fill="currentColor" fill-rule="evenodd"></path>
                                                <path clip-rule="evenodd"
                                                    d="M24.75 1L0.75 25L23.75 47H131.75L155.75 25L131.75 1H24.75Z"
                                                    fill-rule="evenodd" stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                            <i class="flaticon-edit"></i>
                                            <?php echo isset($_SESSION['user_id']) ? 'Logout' : 'Sign In'; ?>
                                        </a>
                                    </li>

                                    <li class="side-toggle-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu  -->
    <div class="tgmobile__menu">
        <nav class="tgmobile__menu-box">
            <div class="close-btn">
                <i class="flaticon-swords-in-cross-arrangement"></i>
            </div>
            <div class="nav-logo">
                <a href="index.php"><img alt="Logo" src="./img/logo.png" /></a>
            </div>
            <!-- <div class="tgmobile__search">
                <form action="#">
                    <input placeholder="Search here..." type="text" />
                    <button><i class="flaticon-loupe"></i></button>
                </form>
            </div> -->
            <div class="tgmobile__menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                    <li>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#">
                            <svg fill="none" height="14" viewbox="0 0 14 14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="tgmobile__menu-backdrop"></div>
    <!-- End Mobile Menu -->
    <!-- header-search -->
    <!-- <div class="search__popup-wrap">
        <div class="search__layer"></div>
        <div class="search__close">
            <span><i class="flaticon-swords-in-cross-arrangement"></i></span>
        </div>
        <div class="search__wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">... <span>Search Here</span> ...</h2>
                        <div class="search__form">
                            <form action="#">
                                <input name="search" placeholder="Type keywords here" required="" type="text" />
                                <button class="search-btn">
                                    <i class="flaticon-loupe"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- header-search-end -->
    <!-- offCanvas-area -->
    <div class="offCanvas__wrap">
        <div class="offCanvas__body">
            <div class="offCanvas__top">
                <div class="offCanvas__logo logo">
                    <a href="index.php"><img alt="Logo" src="./img/logo.png" /></a>
                </div>
                <div class="offCanvas__toggle">
                    <i class="flaticon-swords-in-cross-arrangement"></i>
                </div>
            </div>
            <div class="offCanvas__content">
                <h2 class="title">
                    Look for the best <span>Game List</span>
                </h2>
                <div class="offCanvas__contact">
                    <h4 class="small-title">CONTACT US</h4>
                    <ul class="offCanvas__contact-list list-wrap">
                        <li><a href="tel:93332225557">+9 333 222 5557</a></li>
                        <li><a href="mailto:info@webmail.com">info@webmail.com</a></li>
                        <li>New Central Park W7 Street ,New York</li>
                    </ul>
                </div>

                <ul class="offCanvas__social list-wrap">
                    <li>
                        <a href="#">
                            <svg fill="none" height="14" viewbox="0 0 14 14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="offCanvas__copyright">
                <p>Copyright © 2024 - By <span>GAMELIST</span></p>
            </div>
        </div>
    </div>
    <div class="offCanvas__overlay"></div>
    <!-- offCanvas-area-end -->
</header>
<!-- header-area-end -->