<?php
require 'DATABASE/function.php';

$db = new DBFunctions();

$csrf_token = bin2hex(random_bytes(16));

function anti_sql_injection($input)
{
  return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $firstname = anti_sql_injection($_POST['firstname']);
  $lastname = anti_sql_injection($_POST['lastname']);
  $email = anti_sql_injection($_POST['email']);
  $password = anti_sql_injection($_POST['password']);
  $birthday = anti_sql_injection($_POST['birthday']);
  $gender = anti_sql_injection($_POST['gender']);

  $existingUser = $db->select('users', '*', ['email' => $email]);

  if (!empty($existingUser)) {
    echo "<script>
            alert('Email already exists. Please use a different email.');
            window.location.href = 'sign-up.php';
          </script>";
    exit();
  }

  $data = [
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'birthday' => $birthday,
    'gender' => $gender,
    'type' => 1
  ];

  if ($db->insert('users', $data)) {
    echo "<script>
            alert('Registration successful!');
            window.location.href = 'sign-up.php';
          </script>";
    exit();
  } else {
    echo "<script>alert('Could not register user.');</script>";
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
                <h2 class="title">Registration</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">
                      Sign Up
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
    <!-- sign-up-area -->
    <section class="sign-up__area team-bg section-pt-120 section-pb-120" data-background="assets/img/bg/team_bg.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="singUp-wrap">
              <h2 class="title">Create Your Account</h2>
              <p>
                Hey there! Ready to join the party? We just need a few details
                from you to get started. Let's do this!
              </p>

              <form action="sign-up.php" method="POST" class="account__form" id="sign-upForm">
                <div class="row gutter-20">
                  <div class="col-md-6">
                    <div class="form-grp">
                      <label for="first-name">First Name</label>
                      <input id="first-name" name="firstname" placeholder="First Name" type="text" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-grp">
                      <label for="last-name">Last Name</label>
                      <input id="last-name" name="lastname" placeholder="Last Name" type="text" required />
                    </div>
                  </div>
                </div>
                <div class="form-grp">
                  <label for="email">Email</label>
                  <input id="email" name="email" placeholder="Email" type="email" required />
                </div>
                <div class="form-grp">
                  <label for="password">Password</label>
                  <input id="password" name="password" placeholder="Password" type="password" required />
                </div>
                <div class="form-grp">
                  <label for="confirm-password">Confirm Password</label>
                  <input id="confirm-password" name="confirm_password" placeholder="Confirm Password" type="password"
                    required />
                </div>
                <div class="form-grp">
                  <label for="birthday">Birthday</label>
                  <input id="birthday" name="birthday" type="date" required />
                </div>
                <div class="form-grp">
                  <label for="gender">Gender</label>
                  <div class="shop__ordering" style="width: 100% !important;">
                    <select name="gender" class="orderby" required>
                      <option value="" disabled selected>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <button class="btn btn-two arrow-btn" type="submit" id="submitBtn">Sign Up</button>
              </form>

              <script>
                const form = document.getElementById('sign-upForm');
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('confirm-password');
                const submitBtn = document.getElementById('submitBtn');

                function validatePasswords() {
                  if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords do not match");
                  } else {
                    confirmPassword.setCustomValidity("");
                  }
                }

                password.addEventListener('input', validatePasswords);
                confirmPassword.addEventListener('input', validatePasswords);

                form.addEventListener('submit', function (e) {
                  validatePasswords();
                  if (confirmPassword.checkValidity() === false) {
                    e.preventDefault(); // Prevent form submission if invalid
                  }
                });
              </script>


              <div class="account__switch">
                <p>Already have an account?<a href="login.php">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- sign-up-area-end -->
  </main>
  <!-- main-area-end -->

  <?php require "footer.php" ?>
</body>

</html>