<?php
session_start();
require 'DATABASE/function.php'; // Include the function.php file

$db = new DBFunctions(); // Assuming this initializes the $conn property

$games = $db->select('games', '*', ['featured' => 1]);
?>

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
  <!-- scroll-top -->
  <button class="scroll__top scroll-to-target" data-target="html">
    <i class="flaticon-right-arrow"></i>
  </button>
  <!-- scroll-top-end-->
  <?php require "header.php" ?>

  <!-- main-area -->
  <main class="main--area">
    <!-- slider-area -->
    <section class="slider__area slider__bg" data-background="assets/img/slider/slider_bg.jpg">
      <div class="slider-activee">
        <div class="single-slider">
          <div class="container custom-container">
            <div class="row justify-content-between">
              <div class="col-lg-6">
                <div class="slider__content">
                  <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s">
                    live gaming
                  </h6>
                  <h2 class="title wow fadeInUp" data-wow-delay=".5s">
                    game list
                  </h2>
                  <p class="wow fadeInUp" data-wow-delay=".8s">
                    video games online
                  </p>
                </div>
              </div>
              <div class="col-xxl-6 col-xl-5 col-lg-6">
                <div class="slider__img text-center">
                  <img alt="img" data-magnetic="" src="./img/slider_img01.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider__shapes">
        <img alt="shape" src="./img/slider_shape01.png" />
        <img alt="shape" src="./img/slider_shape02.png" />
        <img alt="shape" src="./img/slider_shape03.png" />
        <img alt="shape" src="./img/slider_shape04.png" />
      </div>
    </section>
    <!-- slider-area-end -->

    <!-- area-background-start -->
    <div class="area-background" data-background="assets/img/bg/area_bg01.jpg">
      <br />
      <!-- gallery-area -->
      <section class="gallery__area fix section-pb-130">
        <div class="gallery__slider">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-9 col-lg-10 col-md-11">
                <div class="swiper-container gallery-active">
                  <div class="swiper-wrapper">
                    <?php
                    if ($games) {
                      foreach ($games as $game) {
                        echo '<div class="swiper-slide">';
                        echo '<div class="gallery__item">';
                        echo '<div class="gallery__thumb">';
                        echo '<a class="popup-image" data-cursor="-theme" data-cursor-text="View &lt;br&gt; Image" href="' . htmlspecialchars($game['image']) . '" title="' . htmlspecialchars($game['game_name']) . '">';
                        echo '<img alt="img" src="' . htmlspecialchars($game['image']) . '" />';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="gallery__content">';
                        echo '<h3 class="title">' . htmlspecialchars($game['game_name']) . '</h3>';
                        echo '<span class="rate">rate ' . htmlspecialchars($game['popularity']) . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                      }
                    }
                    ?>
                  </div>
                  <!-- scrollbar -->
                  <div class="swiper-scrollbar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- gallery-area-end -->
    </div>
    <!-- area-background-end -->

    <!-- team-area -->
    <section class="team__area team-bg section-pt-130 section-pb-100" data-background="assets/img/bg/team_bg.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-7 col-md-10">
            <div class="section__title text-center mb-60">
              <span class="sub-title tg__animate-text">our team member</span>
              <h3 class="title">ACTIVE TEAM MEMBERS</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
            <div class="team__item">
              <div class="team__thumb">
                <a href="team-details.php"><img alt="img" src="./img/team01.png" /></a>
              </div>
              <div class="team__content">
                <h4 class="name">
                  <a href="team-details.php">killer master</a>
                </h4>
                <span class="designation">Blockchain Expert</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
            <div class="team__item">
              <div class="team__thumb">
                <a href="team-details.php"><img alt="img" src="./img/team02.png" /></a>
              </div>
              <div class="team__content">
                <h4 class="name">
                  <a href="team-details.php">tanu mark</a>
                </h4>
                <span class="designation">Developer</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
            <div class="team__item">
              <div class="team__thumb">
                <a href="team-details.php"><img alt="img" src="./img/team03.png" /></a>
              </div>
              <div class="team__content">
                <h4 class="name">
                  <a href="team-details.php">Thompson Scot</a>
                </h4>
                <span class="designation">Art Director</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
            <div class="team__item">
              <div class="team__thumb">
                <a href="team-details.php"><img alt="img" src="./img/team04.png" /></a>
              </div>
              <div class="team__content">
                <h4 class="name">
                  <a href="team-details.php">Shakh Danial</a>
                </h4>
                <span class="designation">Crypto Advisor</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- team-area-end -->
  </main>
  <!-- main-area-end -->
  <?php require "footer.php" ?>
</body>

</html>