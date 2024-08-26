<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="ie=edge" http-equiv="x-ua-compatible" />
  <title>GAMELIST</title>
  <meta content="eSports and Gaming NFT Template" name="description" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <!-- Place favicon.ico in the root directory -->
  <link href="assets/img/favicon.png" rel="shortcut icon" type="image/x-icon" />
  <!-- CSS here -->
  <link href="./css/plugins.css" rel="stylesheet" />
  <link href="./css/main.css" rel="stylesheet" />
  <!-- Page-Revealer -->
  <script src="./js/tg-page-head.js"></script>
</head>

<body>
  <!-- Scroll-top -->
  <button class="scroll__top scroll-to-target" data-target="html">
    <i class="flaticon-right-arrow"></i>
  </button>
  <!-- Scroll-top-end-->
  <?php require "header.php" ?>

  <!-- main-area -->
  <main class="main--area">
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="assets/img/bg/breadcrumb_bg02.jpg">
      <div class="container">
        <div class="breadcrumb__wrapper">
          <div class="row">
            <div class="col-12">
              <div class="breadcrumb__content">
                <h2 class="title">Contact us</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">
                      contact
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- contact-area -->
    <section class="contact-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-10">
            <div class="contact__content">
              <h2 class="overlay-title"><span>join us</span></h2>
              <h2 class="title">CONTACT US AND FIND YOUR GAMELIST</h2>
              <p>
                Axcepteur sint occaecat atat non proident, sunt culpa officia
                deserunt mollit anim id est labor umLor emdolor
              </p>
              <div class="footer-el-widget">
                <h4 class="title">information</h4>
                <ul class="list-wrap">
                  <li><a href="tel:123">+971 333 222 557</a></li>
                  <li>
                    <a href="mailto:info@exemple.com">info@exemple.com</a>
                  </li>
                  <li>New Central Park W7 Street, New York</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-10">
            <div class="contact__form-wrap">
              <form action="assets/mail.php" id="contact-form" method="POST">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-grp">
                      <input name="name" placeholder="Name *" required="" type="text" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-grp">
                      <input name="email" placeholder="Email *" required="" type="email" />
                    </div>
                  </div>
                </div>
                <div class="input-grp message-grp">
                  <textarea cols="30" name="message" placeholder="Enter your message" rows="10"></textarea>
                </div>
                <button class="submit-btn">Submit Now</button>
              </form>
              <p class="ajax-response"></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact-area-end -->
    <!-- contact-map -->
    <div class="contact-map">
      <iframe allowfullscreen="" loading="lazy"
        src="https://geo-devrel-javascript-samples.web.app/samples/style-array/app/dist/"></iframe>
    </div>
    <!-- contact-map-end -->
  </main>
  <!-- main-area-end -->

  <?php require "footer.php" ?>

</body>

</html>