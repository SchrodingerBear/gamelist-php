<?php
require 'DATABASE/function.php';

$db = new DBFunctions();

$csrf_token = bin2hex(random_bytes(16));

function anti_sql_injection($input)
{
  return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = anti_sql_injection($_POST['email']);
  $password = anti_sql_injection($_POST['password']);

  $user = $db->select('users', '*', ['email' => $email]);

  if (!empty($user)) {
    if (password_verify($password, $user[0]['password'])) {
      session_start();
      $_SESSION['user_id'] = $user[0]['id'];
      $_SESSION['type'] = $user[0]['type'];
      $_SESSION['name'] = $user[0]['firstname'] . " " . $user[0]['lastname'];

      if ($user[0]['type'] == 1) {
        echo "<script>window.location.href = 'gamelist.php';</script>";
      } else {
        echo "<script>window.location.href = 'gamelist.php';</script>";
      }
      exit();
    } else {
      echo "<script>alert('Invalid password. Please try again.');</script>";
    }
  } else {
    echo "<script>alert('Account not found. Please sign-up.');</script>";

  }
}
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
  <!-- Scroll-top -->
  <button class="scroll__top scroll-to-target" data-target="html">
    <i class="flaticon-right-arrow"></i>
  </button>
  <!-- Scroll-top-end-->
  <?php require "header.php" ?>

  <!-- main-area -->
  <main class="main--area">
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" data-background="assets/img/bg/breadcrumb_bg01.jpg">
      <div class="container">
        <div class="breadcrumb__wrapper">
          <div class="row">
            <div class="col-xl-6 col-lg-7">
              <div class="breadcrumb__content">
                <h2 class="title">Login</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">
                      Sign In
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5 position-relative d-none d-lg-block">
              <div class="breadcrumb__img">
                <img alt="img" src="./img/breadcrumb_img02.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- signup-area -->
    <section class="signup__area team-bg section-pt-120 section-pb-120" data-background="assets/img/bg/team_bg.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="singUp-wrap">
              <h2 class="title">Welcome back!</h2>
              <p>
                Hey there! Ready to log in? Just enter your username and
                password below and you'll be back in action in no time. Let's
                go!
              </p>
              <form action="login.php" method="post" class="account__form">
                <div class="form-grp">
                  <label for="email">Email</label>
                  <input id="email" name="email" placeholder="email" type="text" />
                </div>
                <div class="form-grp">
                  <label for="password">Password</label>
                  <input id="password" name="password" placeholder="password" type="password" />
                </div>
                <div class="account__check">
                  <div class="account__check-remember">
                    <input class="form-check-input" id="terms-check" type="checkbox" value="" />
                    <label class="form-check-label" for="terms-check">Remember me</label>
                  </div>

                </div>
                <button class="btn btn-two arrow-btn" type="submit">
                  Login
                </button>
              </form>
              <div class="account__switch">
                <p>
                  Don't have an account?<a href="sign-up.php">Sign Up</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- signup-area-end -->
  </main>
  <!-- main-area-end -->

  <?php require "footer.php" ?>

</body>

</html>