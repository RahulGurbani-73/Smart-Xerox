<?php include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="payment.css">
</head>

<body class="background">
  <!-- Navbar Section -->
  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0" style="background: rgb(24,47,51);">
    <div class="container-fluid text-light">
      <div class="col-md-4">
        <img src="./images/logo.png" class="img-fluid" alt="" width="15%" height="15%">
      </div>
      <div>
        <?php
        session_start();
        error_reporting(E_ERROR | E_PARSE);

        if (session_status() == PHP_SESSION_ACTIVE) {
          if ($_SESSION['logged_in'] === true) {
        ?>
            <h4 style="text-align:left;" class="f">Hello <?php echo $_SESSION['firstname']; ?></h4>
        <?php }
        }
        error_reporting();
        ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll col-md-7.5" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="index.php#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#upload">Upload</a>
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
              <a class="nav-link active text-light" aria-current="page" href="logout.php">logout</a>
            </li>
          <?php } ?>
          <!--<li class="nav-item">
            <a class="nav-link active text-light" href="admin.php">Admin</a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Payment Section -->
  <div class="container mt-5">
    <div class="row pt-5">
      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
        <div id="accordion">
          <!-- DELIVERY ADDRESS -->
          <div class="card">
            <div class="card-header">
              <div class="row pt-3">
                <div class="col-2 text-center">
                  <span style="padding:2% 8%;border:1px solid transparent;background-color: rgb(197, 191, 191);">1</span>
                </div>
                <div class="col-6">
                  <span style="font-size:15px;font-weight:600;color:grey;text-transform: uppercase;">Delivery address</span>
                  <p>user address</p>
                </div>
                <div class="col-4 pl-0">
                  <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" id="button-hidder" style='text-transform: uppercase;'>Change</button>
                </div>
              </div>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <div class="row pl-3">
                  <div class="col-6">
                    <input type="radio" class="hide-for-front" name="address" checked>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="text-transform:uppercase;font-size:15px;">
                      <?php echo $_SESSION['firstname']; ?>
                    </span>
                  </div>
                  <div class="col-6 text-right pr-5">
                    <a href="#/" class="edit hide-for-front" style="text-transform: uppercase;">Address edit</a>
                  </div>
                </div>
                <div class="row pl-5 pb-3 hide-for-front">
                  <div class="col">
                    <span style="text-transform: uppercase;">user address</span>
                  </div>
                </div>
                <div class="row pl-5 hide-for-front">
                  <div class="col">
                    <p>
                      <button style="text-transform: uppercase;padding:2% 5%;background-color: tomato;color:white;border-color:transparent"
                        data-toggle="collapse"
                        data-target="#payment-option"
                        id="button-hidder-2">
                        Delivery here
                      </button>

                    </p>
                  </div>
                </div>
                <div class="row pl-3">
                  <div class="col-6">
                    <input type="radio" class="hide-for-front" name="address" checked>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="text-transform:uppercase;font-size:15px;">
                      <?php echo $_SESSION['firstname']; ?>
                    </span>
                  </div>
                  <div class="col-6 text-right pr-5">
                    <a href="#/" class="edit hide-for-front" style="text-transform: uppercase;"></a>
                  </div>
                </div>
                <div class="row pl-5 pb-3 hide-for-front">
                  <div class="col">
                    <span style="text-transform: uppercase;">PICK UP FROM SHOP</span>
                  </div>
                </div>
                <div class="row pl-5 hide-for-front">
                  <div class="col">
                    <p>
                      <button style="text-transform: uppercase;padding:2% 5%;background-color: tomato;color:white;border-color:transparent"
                        data-toggle="collapse"
                        data-target="#payment-option"
                        id="button-hidder-1">
                        PICK UP Order
                      </button>

                    </p>
                  </div>
                </div>
                
                <form action="save_address.php" method="POST" class="container show-for-front">
                  <div class="row pl-3">
                    <input type="radio" checked>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="text-transform:uppercase;font-size:15px;">EDIT ADDRESS</span>
                  </div>
                  <div class="row pl-5 pt-3 pb-3">
                    <button type="button" class="btn-primary text-white pl-4 pr-4 pt-2 pb-2" style="border-radius:10px;">Use my current location</button>
                  </div>

                  <div class="row pr-0 pb-3">
                    <div class="col-6 text-right pr-0">
                      <input type="text" name="pincode" placeholder="Pincode" style="width:90%;height:50px;" class="pl-3" required pattern="[0-9]{6}" title="Enter a valid 6-digit pincode">
                    </div>
                    <div class="col-6">
                      <input type="text" name="locality" placeholder="Locality" style="width:90%;height:50px;" class="pl-3" required>
                    </div>
                  </div>
                  <div class="row pb-3" style="padding-left:4.7%">
                    <div class="col">
                      <input type="text" name="address" placeholder="Address (Area and Street)" style="width:95%;height:50px;" class="pl-3" required>
                    </div>
                  </div>
                  <div class="row pb-3">
                    <div class="col-6 text-right pr-0">
                      <input type="text" name="city" placeholder="City/District/Town" style="width:90%;height:50px;" class="pl-3" required>
                    </div>
                    <div class="col-6">
                      <input type="text" name="state" placeholder="State" style="width:90%;height:50px;" class="pl-3" required>
                    </div>
                  </div>
                  <div class="row pr-0 pb-3">
                    <div class="col-6 text-right pr-0">
                      <input type="text" name="landmark" placeholder="Landmark (optional)" style="width:90%;height:50px;" class="pl-3">
                    </div>
                    <div class="col-6">
                      <input type="text" name="alt_phone" placeholder="Alternate Phone (Optional)" style="width:90%;height:50px;" class="pl-3">
                    </div>
                  </div>
                  <div class="row pl-5">
                    <button type="submit" class="btn-primary text-white pl-4 pr-4 pt-2 pb-2" style="border-radius:10px;text-transform: uppercase;font-weight: 600;">
                      Save and deliver here
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <span class="pt-2 call-back">
                      <a href="#/" style="text-transform: uppercase;">Cancel</a>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php


          // Fetch the latest order price
          $query = "SELECT totalPrice FROM upload ORDER BY order_id DESC LIMIT 1";
          $result = mysqli_query($conn, $query);
          $order = mysqli_fetch_assoc($result);

          $price = $order['totalPrice'] ?? 0; // Default to 0 if no orders found
          ?>

          <!-- PAYMENT OPTIONS -->
          <div class="card">
            <div class="card-header">
              <div class="row pt-3 pb-3">
                <div class="col-2 text-center">
                  <span style="padding:2% 8%;border:1px solid transparent;background-color: rgb(197, 191, 191);">2</span>
                </div>
                <div class="col-10">
                  <span style="font-size:15px;font-weight:600;color:grey;text-transform: uppercase;">Payment Options</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="collapse" id="payment-option">
                <div class="row">
                  <div class="col pl-4 pb-3" id="phone-pe-hidder">
                    <input type="radio" name="payment-method" data-toggle="collapse" data-target="#phonepe">
                    &nbsp;&nbsp;&nbsp;<img src="images/phone-pe.png" style="height:30px;"> PhonePe
                  </div>
                </div>
                <div id="phonepe" class="collapse">
                  <div class="row pt-2">
                    <div class="col text-center">
                      <p>You'll be redirected to PhonePe page, where you can pay using UPI, credit/debit card or
                        wallet</p>
                    </div>
                  </div>
                  <div class="row pl-5">
                    <div class="col">
                      <p>
                        <a href="phonepe.php">
                          <button
                            style="text-transform: uppercase;padding:1.5% 7%;background-color: tomato;color:white;border-color:transparent"
                            data-toggle="collapse" data-target="#payment-option">
                            continue&nbsp; &#8377;<?php echo number_format($price); ?>
                          </button>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col pl-4" id="debit-hidder">
                    <p>
                      <input type="radio" name="payment-method" data-toggle="collapse" data-target="#debit">
                      &nbsp;&nbsp;&nbsp;Credit/Debit/ATM Card
                    </p>
                  </div>
                </div>
                <div class="collapse" id="debit">
                  <div class="row">
                    <div class="col pl-5">
                      <p>
                        <input type="text" placeholder="Enter Card Number" class="pt-2 pb-2 pl-4 card-number"
                          required>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4  col-sm-6  col-12  pl-5">
                      <p>
                        <input type="date" placeholder="DD/MM/YY" class="pt-2 pb-2 pl-2 pr-2 date" required>
                      </p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2  col-sm-3  col-12 pl-5">
                      <p>
                        <input type="text" placeholder="CVV" class="pt-2 pb-2 pl-4 cvv" required>
                      </p>
                    </div>
                    <div class="col-xl-6 pt-1 pl-5">
                      <p>
                        <button
                          style="text-transform: uppercase;padding:1.5% 7%;background-color: tomato;color:white;border-color:transparent"
                          data-toggle="collapse" data-target="#payment-option" onclick="confirmPayment()">
                          PAY&nbsp; &#8377;<?php echo number_format($price); ?>
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col pl-4" id="net-banking-hidder">
                    <p>
                      <input type="radio" name="payment-method" data-target="#net-banking" data-toggle="collapse">
                      &nbsp;&nbsp;&nbsp;Net Banking
                    </p>
                  </div>
                </div>
                <div class="collapse" id="net-banking">
                  <div class="row pl-4 pr-4">
                    <div class="col-12 pb-2">
                      POPULAR BANKS
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <input type="radio" name="bank">
                      &nbsp;&nbsp;&nbsp;<img src="images/hdfc-logo.png" style="height:20px">
                      &nbsp;&nbsp;HDFC Bank
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <input type="radio" name="bank">
                      &nbsp;&nbsp;<img src="images/ici-logo.png" style="height:30px">
                      &nbsp;&nbsp;ICICI Bank
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <input type="radio" name="bank">
                      &nbsp;&nbsp;&nbsp;<img src="images/state-logo.png" style="height:20px">
                      &nbsp;&nbsp;State Bank Of India
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <input type="radio" name="bank">
                      &nbsp;&nbsp;&nbsp;<img src="images/axis-logo.jpg" style="height:20px">
                      &nbsp;&nbsp;Axis Bank
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <input type="radio" name="bank">
                      &nbsp;&nbsp;<img src="images/kotak-logo.jpeg" style="height:30px">
                      &nbsp;&nbsp;Kotak Bank
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pt-3">
                      <span style="visibility: hidden;">hello user</span>
                    </div>
                  </div>
                  <div class="row pt-3 pl-4">
                    <div class="col-12">
                      <span>Other Bank</span>
                    </div>
                    <div class="col-12 pt-3">
                      <input type="text" placeholder="Bank Name" style="width:50%" class="pt-1 pb-1 pl-4">
                    </div>
                    <div class="col-12 pt-4">
                      <p>
                        <button
                          style="text-transform: uppercase;padding:1.5% 7%;background-color: grey;color:white;border-color:transparent;font-weight: 600;"
                          data-toggle="collapse" data-target="#payment-option" onclick="confirmPayment()">
                          PAY&nbsp; &#8377;<?php echo number_format($price); ?>
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col pl-4" id="cash-hidder">
                    <p>
                      <input type="radio" name="payment-method" data-toggle="collapse" onclick="confirmPayment()" data-target="#cash">
                      &nbsp;&nbsp;&nbsp;Cash on Delivery
                    </p>
                    <div class="collapse" id="cash">
                      <p class="pl-3">
                        <button
                          style="text-transform: uppercase;padding:1.5% 7%;background-color: grey;color:white;border-color:transparent;font-weight: 600;"
                          data-toggle="collapse" data-target="#payment-option" id="cash-confirm" onclick="confirmPayment()">
                          confirm
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- PRICE DETAILS -->
      <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 pt-4">
        <div class="container">
          <div class="card">
            <div class="card-header">PRICE DETAILS</div>
            <div class="card-body">
              <div class="row">
                <div class="col text-left">
                  Price :
                </div>
                <div class="col text-right">
                  &#8377;<?php echo number_format($price); ?>
                </div>
              </div>
              <div class="row pt-3">
                <div class="col-7 text-left">
                  Delivery Charges :
                </div>
                <div class="col text-right">
                  Free
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col text-left">
                  Total Amount :
                </div>
                <div class="col text-right">
                  &#8377;<?php echo number_format($price); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /row -->
  </div> <!-- /container -->



  <!-- Footer Section -->
  <div class="container-fluid bg-dark text-white mt-5">
    <div class="container">
      <div class="row ">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 footer pt-5">
          <p style="font-size:20px;text-transform: uppercase;font-weight: 800;" data-aos="slide-right">company name</p>
          <p data-aos="slide-right">
            Here you can use rows and<br>
            to organize your footer content.<br>
            Lorem ipsum dolor sit amet,<br>
            consectetur adipisicing elit.<br>
          </p>
        </div>
        <div class="col-xl-3 pt-5 hide-girl">
          <span style="font-size:20px;text-transform: uppercase;font-weight: 800;" data-aos="zoom-in-left">products</span><br>
          <p style="margin-top:3%" data-aos="slide-up">M D Bootstrap</p>
          <p style="margin-top:-3%" data-aos="slide-up">M D Bootstrap</p>
          <p style="margin-top:-3%" data-aos="slide-up">M D Bootstrap</p>
          <p style="margin-top:-3%;" data-aos="slide-up">M D Bootstrap</p>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 footer pt-5">
          <span style="font-size:20px;text-transform: uppercase;font-weight: 800;" class="text-center" data-aos="zoom-in-left">useful link</span><br>
          <p style="margin-top:3%;margin-left:1%;" data-aos="fade-up">your account</p>
          <p style="margin-top:-3%;margin-left:1%;" data-aos="fade-up">your account</p>
          <p style="margin-top:-3%;margin-left:1%;" data-aos="fade-up">your account</p>
          <p style="margin-top:-3%;margin-left:1%;" data-aos="fade-up">your account</p>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 col-12 footer pt-5 pb-3">
          <p style="font-size:20px;text-transform: uppercase;font-weight: 800;" data-aos="slide-left">contact</p>
          <p data-aos="fade-up">
            <i class="fa fa-home" aria-hidden="true" style="font-size:20px;"></i>&nbsp; New York, 10012,
          </p>
          <p data-aos="fade-up">
            <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; info@gmail.com
          </p>
          <p data-aos="fade-up">
            <i class="fa fa-phone" aria-hidden="true"></i>&nbsp; + 01 234 567 88
          </p>
          <p data-aos="fade-up">
            <i class="fa fa-print" aria-hidden="true"></i>&nbsp; + 01 234 567 89
          </p>
        </div>
      </div>
    </div>
    <hr style="color:white;width:100%;border:1px solid">
    <div class="container mt-4 pb-4">
      <div class="row">
        <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
          <p>© 2020 Copyright:
            <span style="font-weight:600">MDBootstrap</span>
          </p>
        </div>
        <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-6 icon-head">
          <span class="icons-2"><i class="fa fa-facebook" aria-hidden="true"></i></span>
          <span class="icons-3"><i class="fa fa-twitter" aria-hidden="true"></i></span>
          <span class="icons-1"><i class="fa fa-google-plus" aria-hidden="true"></i></span>
          <span class="icons"><i class="fa fa-instagram" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 1000,
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous">
  </script>
  <script>
    // Function to handle payment processing

    function confirmPayment() {
    alert("Your payment was successful. Check the order history to accept your order.");
    window.location.href = "order_page.php";
    }
  </script>
  <script src="payment.js"></script>

  <script>
    function updatePaymentStatus(paymentType, orderToken) {
      if (!orderToken) {
        alert("Order token is missing! Please try again.");
        return;
      }

      fetch("update_payment_status.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: `payment_type=${paymentType}&token=${orderToken}`
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Your Payment is Successful. Check Order History to accept your order.");
            window.location.href = `order_page.php?token=${orderToken}`;
          } else {
            alert("Payment failed! Try again.");
          }
        })
        .catch(error => {
          alert("Something went wrong. Please try again.");
        });
    }
  </script>



</body>

</html>