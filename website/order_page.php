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
                <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll col-md-6" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="upload_page.php#upload">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php#about_us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php#contact_us">Contact Us</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" data-bs-target="#modal" data-bs-toggle="modal">Login</a>
                        </li>
                    <?php } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="logout.php">logout</a>
                        </li>
                    <?php
                    }
                    ?>

                    <!--<li class="nav-item">
                        <a class="nav-link active text-light" href="admin.php">Admin</a>
                    </li>-->

                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-5">
        <h2 class="text-center">Order History</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center" style="background-color: black; color:white;">
                    <th>Order ID</th>
                    <th>Token ID</th>
                    <th>Origin</th>
                    <th>Color</th>
                    <th>File Type</th>
                    <th>Side</th>
                    <th>Time</th>
                    <th>Print Status</th>
                    <th>Payment Status</th>
                    <th>Estimated Completion Time</th>
                    <th>Pickup Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user = $_SESSION['firstname'];
                $sql1 = "SELECT * FROM upload WHERE firstname='" . $user . "' ORDER BY token ASC";
                $res = mysqli_query($conn, $sql1);

                $base_time = 5; // Base processing time for the first file
                $increment_time = 0.2; // Additional time per order
                $order_count = 0;
                $current_time = time(); // Get current time in seconds

                while ($row = mysqli_fetch_array($res)) {
                    if ($row['status'] == "Accepted") { // Only show time if order is accepted
                        $order_count++;
                        $completion_time = $base_time + ($increment_time * ($order_count - 1) * 10);
                        $pickup_time = date("h:i A", $current_time + ($completion_time * 60)); // Convert minutes to seconds and add to current time
                    } else {
                        $completion_time = "-";
                        $pickup_time = "-";
                    }

                    echo "<tr class='text-center'>";
                    echo "<td>{$row['order_id']}</td>";
                    echo "<td>" . ($row['status'] == 1 ? '' : $row['token']) . "</td>";
                    echo "<td>{$row['orin']}</td>";
                    echo "<td>{$row['color']}</td>";
                    echo "<td>{$row['type']}</td>";
                    echo "<td>{$row['side']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>" . ($row['status'] == 1 ? '<span style=" color:lightred">Processing</span>' : '<span style="color:lightgreen">Accepted Order</span>') . "</td>";
                    echo "<td>" . ($row['payment_status'] == "Pending" ? '<span style=" color:lightred">Processing</span>' : '<span style="color:lightgreen">Paid</span>') . "</td>";
                    echo "<td><span class='badge bg-info text-dark'>{$completion_time} </span></td>";
                    echo "<td><span class='badge bg-primary text-white'>{$pickup_time}</span></td>";
                    echo "<td> "
                    ?>
                        <form method="post" action="view.php">
                            <input type="hidden" name="token" value="<?php echo $row["token"]; ?>">
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous">
    </script>

</body>

</html>