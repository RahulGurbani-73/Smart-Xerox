<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="background">


  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0" style="background: rgb(24,47,51);">
    <div class="container-fluid text-light">
      <div class="col-md-4">
        <img src="./images/logo.png" class="img-fluid" alt="" width="15%" height="15%">
      </div>
      <div>
        <?php
        session_start();
        error_reporting(E_ERROR | E_PARSE);

        if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
          echo '<h4 style="text-align:left;" class="f">Hello ' . $_SESSION['firstname'] . '</h4>';
        }
        ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll col-md-7.5" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#about_us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#contact_us">Contact Us</a>
          </li>

          <?php
          if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
          ?>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" data-bs-target="#modal" data-bs-toggle="modal">Login</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="upload_page.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="order_page.php">Order History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="logout.php">Logout</a>
            </li>
          <?php } ?>

          <!--<li class="nav-item">
            <a class="nav-link active text-light" href="admin.php">Admin</a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>


  <div class="modal" tabindex="-1" id="modal" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content login_background">
        <div class="modal-header" style="border-bottom: none;">
          <h3 class="col text-center">Welcome</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row justify-content-center align-content-center">
              <form action="login.php" method="post" class="form">
                <p class="col text-center">Sign in to your account</p>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="d-flex justify-content-around">
                  <div class="mb-3 form-check">
                    <a href="#">Forgot Password</a>
                  </div>
                  <div class="mb-3 form-check">
                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#register">Create Account</a>
                  </div>
                </div>
                <div class="md-3 align-content-center text-center"><button type="submit" class="btn btn-primary">Login</button></div>
              </form>
            </div>
          </div>

          <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
            <style>
              .path-0 {
                animation: pathAnim-0 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
              }

              @keyframes pathAnim-0 {
                0% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                25% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 121.86666666666667,179.33333333333334 243.73333333333335,192.66666666666669 393,176 C 542.2666666666667,159.33333333333331 718.9333333333334,112.66666666666666 898,106 C 1077.0666666666666,99.33333333333334 1258.5333333333333,132.66666666666669 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                50% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 176.66666666666669,197.86666666666667 353.33333333333337,229.73333333333332 519,219 C 684.6666666666666,208.26666666666668 839.3333333333333,154.93333333333334 991,139 C 1142.6666666666667,123.06666666666666 1291.3333333333335,144.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                75% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 133.7333333333333,159.60000000000002 267.4666666666666,153.20000000000002 436,152 C 604.5333333333334,150.79999999999998 807.8666666666668,154.8 981,158 C 1154.1333333333332,161.2 1297.0666666666666,163.6 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                100% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }
              }
            </style>
            <defs>
              <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#152f33"></stop>
                <stop offset="95%" stop-color="#00e0be"></stop>
              </linearGradient>
            </defs>
            <path d="M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            <style>
              .path-1 {
                animation: pathAnim-1 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
              }

              @keyframes pathAnim-1 {
                0% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                25% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 203.06666666666666,312.3333333333333 406.1333333333333,291.66666666666663 543,288 C 679.8666666666667,284.33333333333337 750.5333333333333,297.6666666666667 889,308 C 1027.4666666666667,318.3333333333333 1233.7333333333333,325.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                50% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 136.53333333333336,358.8666666666667 273.0666666666667,384.7333333333333 422,373 C 570.9333333333333,361.2666666666667 732.2666666666667,311.93333333333334 904,299 C 1075.7333333333333,286.06666666666666 1257.8666666666668,309.5333333333333 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                75% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 141.86666666666667,329.6666666666667 283.73333333333335,326.33333333333337 428,313 C 572.2666666666667,299.66666666666663 718.9333333333334,276.3333333333333 888,278 C 1057.0666666666666,279.6666666666667 1248.5333333333333,306.33333333333337 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                100% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }
              }
            </style>
            <defs>
              <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#152f33"></stop>
                <stop offset="95%" stop-color="#00e0be"></stop>
              </linearGradient>
            </defs>
            <path d="M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
          </svg>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>


  <!-- Navbar Section End -->

  <!-- Hero-section Start -->
  <div class="container-fluid">
    <div class="row justify-content-between align-content-center align-items-center">
      <div class="col-md-6 px-5">
        <h1 class="p-2 font-weight-bold font-italic display-1" style="margin-left:10%; color:rgb(24,47,51); font-size:50px; font-weight:900">
          Welcome to Website
        </h1>
        <p class="mt-1 lead" style="margin-left:10%;">Streamline Your Printing Process with Xerox: Meet Our Heroic
          Printing Management System.</p>



        <div style="margin-left:10%;">
          <?php if (isset($_SESSION['logged_in'])): ?>
            <button class="btn btn-grad active"><a href="upload_page.php">Upload File</a></button>
          <?php else: ?>
            <button class="btn btn-grad active" data-bs-target="#register" data-bs-toggle="modal" aria-current="page">Register</button>
          <?php endif; ?>
        </div>
        <!-- Upload page link (Hidden initially) -->

      </div>
      <div class="col-md-6 mb-5">
        <div class="fancy-border-radius">
          <img src="./images/dashboard.png" class="img-fluid dashboard px-5" alt="">
        </div>
      </div>
    </div>
  </div>

  <script>
    // Check login status from sessionStorage (or use localStorage)
    document.addEventListener("DOMContentLoaded", function() {
      let isLoggedIn = sessionStorage.getItem("logged_in"); // Change this based on backend logic

      if (isLoggedIn === "true") {
        document.getElementById("register-btn").style.display = "none"; // Hide Register button
        document.getElementById("upload-section").classList.remove("d-none"); // Show Upload button
      }
    });

    // Example: Call this function on successful login
    function loginSuccess() {
      sessionStorage.setItem("loggedIn", "true");
      location.reload(); // Refresh to apply changes
    }
  </script>




  <!-- hero-section End -->

  <div class="container modal" id="register" tabindex="-1" aria-hidden="true">
    <div class="row justify-content-center align-content-center flex-column">

      <form action="register.php" method="post" class="col-md-6 bg-light p-5 form rounded-4 shadow-lg" style="margin-top: 1.2rem;">
        <!-- Close Button (Top-Right) -->
        <div class="d-flex justify-content-end">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <h1 class="col text-center">Registration</h1>
        <p class="col text-center">Sign in to your account</p>

        <div class="row">
          <div class="mb-3 col">
            <label class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo isset($_GET['firstname']) ? $_GET['firstname'] : ''; ?>" required>
          </div>
          <div class="mb-3 col">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="<?php echo isset($_GET['lastname']) ? $_GET['lastname'] : ''; ?>" required>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
          </div>
          <div class="mb-3 col">
            <label class="form-label">Mobile No</label>
            <input type="text" name="mobile" class="form-control" value="<?php echo isset($_GET['mobile']) ? $_GET['mobile'] : ''; ?>" required>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col">
            <label class="form-label">Enrollment No / Roll No</label>
            <input type="text" name="enroll" class="form-control" value="<?php echo isset($_GET['enroll']) ? $_GET['enroll'] : ''; ?>" required>
          </div>
          <div class="mb-3 col">
            <label class="form-label">Branch / Semester</label>
            <input type="text" name="sem" class="form-control" value="<?php echo isset($_GET['sem']) ? $_GET['sem'] : ''; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 form-check text-center">
          <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal">Already have an Account?</a>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <button type="submit" class="btn btn-primary">Create Account</button>
          <a href="index.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button></a>
        </div>
      </form>

    </div>
  </div>

  <!--<div class="container-fluid py-5 mt-5" style="background-color:rgb(24,47,51)" id="upload">
    <div class="row align-items-center justify-content-center align-content-center">
      <div class="col-md-5 mt-4 text-light">
        <h1 class="text-center">Upload Your Document</h1>
      </div>
    </div>
    <div class="row align-items-center justify-content-evenly align-content-center p-1">
      <div class="col-md-4">
        <img src="./images/Upload.png">
      </div>
      <div class="col-md-4">
        <form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return checkLoginStatus(event)">
          <div>
            <label for="formFileLg" class="form-label text-light">Upload File</label>
            <input type="file" name="file" class="form-control form-control-lg" id="formFileLg">
          </div>
          <label class="form-label text-light mt-3">Number of Copies</label>
          <input type="number" name="copies" class="form-control" min="1" value="1" required>
          <select class="form-select mt-4" name="orin" style="background-color:rgb(0,223,192)" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Orientation</option>
            <option value="LandScape" style="background-color:rgb(164,245,236)">LandScape</option>
            <option value="Portrait" style="background-color:rgb(164,245,236)">Portrait</option>
          </select>
          <select class="form-select mt-4" name="color" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Color</option>
            <option value="Black & White">Black & White</option>
            <option value="Color">Color</option>
          </select>
          <select class="form-select mt-4" name="side" style="background-color:rgb(0,223,192)" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Side</option>
            <option value="One Side" style="background-color:rgb(164,245,236)">One Side</option>
            <option value="Two Side" style="background-color:rgb(164,245,236)">Two Side</option>
          </select>
          <select class="form-select mt-4" name="type" aria-label="Default select example">
            <option value="" disabled selected hidden>Prints</option>
            <option value="Normal">Normal</option>
            <option value="Spiral">Spiral</option>
            <option value="Stappel">Stappel</option>
          </select>
          <input type="submit" class="btn mt-3" value="Upload" style="background-color:rgb(0,180,192);">
        </form>
      </div>
    </div>
  </div>-->


  <?php
  session_start(); // Start session

  // Check if the user is logged in
  $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
  ?>
  <script>
    function checkLoginStatus(event) {
      var isLoggedIn = <?php echo json_encode($isLoggedIn); ?>; // Get login status from PHP

      if (!isLoggedIn) {
        alert("Please login first to upload your document.");
        event.preventDefault(); // Prevent form submission
        window.location.href = 'login.php'; // Redirect to login page
      }
    }
  </script>

  <!-- About Us Start -->

  <div class="container py-5" id="about_us">
    <div class="row align-content-center justify-content-center align-items-center">
      <div class="col-md-2 mt-5">
        <h2 class="text-center fw-bold">About Us</h2>
        <div class="underline"></div>
      </div>
      <div class="row align-content-center justify-content-center align-items-center">
        <div class="col-md-8 mt-2">
          <p>About Us – The Visionaries Behind Smart Xerox

            At Smart Xerox, we are a triumvirate of innovators, united by a singular ambition—to refine the archaic art of printing into a seamless, intelligent experience.<br>

            🔹 Harsh Mankani – The tech virtuoso, architecting seamless functionality.<br>
            🔹 Rahul Gurbani – The creative mastermind, sculpting vision into reality.<br>
            🔹 Kushal Modi – The operational linchpin, ensuring flawless execution.<br>

            Disillusioned by the inefficiencies of conventional photocopying, we forged a solution that banishes queues and antiquated methods. Smart Xerox distills the printing process into an effortless, digital symphony—swift, automated, and impeccably designed for modern academia and enterprise.

            This is but the genesis. With relentless ingenuity, we pledge to redefine efficiency, one print at a time.

            Welcome to Smart Xerox—where sophistication meets simplicity.</p>
        </div>
        <div class="row align-content-center justify-content-center align-items-center">
          <div class="col-md-6 mb-3">
            <h3 class="text-center fw-bold">Our Team</h3>
          </div>
        </div>

        <div class="col">
          <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
            <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3 alt=" ..."" alt="...">
            <div class="card-body">
              <h5 class="card-title text-light text-center">----------Harsh Mankani----------</h5>
              <p class="card-text text-light">Team Dictator</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
            <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3" alt="...">
            <div class="card-body">
              <h5 class="card-title text-light text-center">----------Rahul Gurbani----------</h5>
              <p class="card-text text-light">
                <align='centre'>
                  </align>Backend Manager
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
            <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3" alt="...">
            <div class="card-body">
              <h5 class="card-title text-light text-center">----------Kushal Modi-----------</h5>
              <p class="card-text  text-light">Frontend Manager </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- About Us End -->

  <!-- Contact Us Start -->
  <div class="container-fluid py-5" id="contact_us" style="background:rgb(24,47,51); color: white;">
    <div class="row justify-content-center align-content-center align-items-center mt-5">
      <div class="col-md-2">
        <h1 class="text-center">Contact Us</h1>
        <div class="underline" style="width:200px; border-color:white;"></div>
      </div>
    </div>

    <div class="row justify-content-center align-content-center align-items-center mt-4">
      <div class="col-md-3">
        <div class="row justify-content-center align-content-center align-items-center mr-0">
          <span class="col-md-2">
            <a href="#"><i class="fab fa-linkedin icon-color fa-2x" style="margin-right:0;"></i></a>
          </span>
          <span class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </span>
        </div>

        <div class="row justify-content-center align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-user icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>

        <div class="row justify-content-between align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-map-marker-alt icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>

        <div class="row justify-content-between align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-envelope icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <h4 class="mb-3">Message Us</h4>
        <form action="contactus.php" method="post">
          <div class="mb-3">
            <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
          </div>
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input type="text" name="subject" placeholder="Subject" class="form-control" required>
          </div>
          <div class="mb-3">
            <textarea rows="5" placeholder="Feedback..." name="feedback" class="form-control" required></textarea>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn" style="background-color:rgb(0,224,190)">Submit</button>
        </form>
      </div>


      <script>
        function switchToLogin(event) {
          event.preventDefault(); // Prevent default link behavior

          var registerModal = document.getElementById('register');
          var loginModal = new bootstrap.Modal(document.getElementById('modal'));

          var modalInstance = bootstrap.Modal.getInstance(registerModal);
          if (modalInstance) {
            modalInstance.hide();
            registerModal.addEventListener('hidden.bs.modal', function() {
              loginModal.show();
            }, {
              once: true
            });
          } else {
            loginModal.show();
          }
        }

        function switchToRegister(event) {
          event.preventDefault();

          var loginModal = document.getElementById('modal');
          var registerModal = new bootstrap.Modal(document.getElementById('register'));

          var modalInstance = bootstrap.Modal.getInstance(loginModal);
          if (modalInstance) {
            modalInstance.hide();
            loginModal.addEventListener('hidden.bs.modal', function() {
              registerModal.show();
            }, {
              once: true
            });
          } else {
            registerModal.show();
          }
        }
      </script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>