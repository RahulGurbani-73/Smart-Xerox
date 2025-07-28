<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactus </title>
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
                <h4 style="text-align:left;" class="f">Hello Admin </h4>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll col-md-7.5" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="Admindashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="user_details.php">User Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="admin.php">Admin Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="payment_status.php">Payment Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="index.php">Logout</a>

                        <!--<li class="nav-item">
            <a class="nav-link active text-light" href="admin.php">Admin</a>
          </li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Contact US</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center" style="background-color: black; color:white;">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Feedback</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM contactus");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";



                    echo "<td>{$row["firstname"]}</td>";
                    echo "<td>{$row["email"]}</td>";
                    echo "<td>{$row["subject"]}</td>";
                    echo "<td>{$row["feedback"]}</td>";
                   

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
</body>

</html>