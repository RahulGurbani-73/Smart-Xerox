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
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="upload_page.php">Upload</a>
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
                    <?php } else { ?>
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


    <div class="container py-5 mt-5" style="background-color:#182F33; border-radius: 15px; box-shadow: 0px 0px 20px rgba(0, 180, 192, 0.5);" id="upload">
        <div class="text-center text-light mb-4">
            <h1 class="fw-bold">Upload Your Documents</h1>
        </div>

        <div class="row align-items-center justify-content-evenly p-3">
            <div class="col-md-4 text-center">
                <img src="./images/Upload.png" class="img-fluid" style="max-width: 110%; border-radius: 10px;">
            </div>
            <div class="col-md-5 p-4" style="background-color:#1C3A40; border-radius: 10px;">
                <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="order_id" name="order_id" value="">

                    <div class="mb-3">
                        <label for="formFileLg" class="form-label text-light">Upload Files ( pdf, doc, docx, jpg, png, jpeg )</label>
                        <input type="file" name="files[]" class="form-control form-control-lg" id="formFileLg" " multiple required>
                    </div>

                    <div class=" mb-3">
                        <label class="form-label text-light">Number of Copies</label>
                        <input type="number" name="copies" class="form-control" min="1" value="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Print Orientation</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="radio" class="btn-check" name="orin" id="landscape" value="LandScape" required>
                            <label class="btn btn-outline-light flex-fill" for="landscape">Landscape</label>

                            <input type="radio" class="btn-check" name="orin" id="portrait" value="Portrait">
                            <label class="btn btn-outline-light flex-fill" for="portrait">Portrait</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Print Color</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="radio" class="btn-check" name="color" id="black_white" value="black & white" required>
                            <label class="btn btn-outline-light flex-fill" for="black_white">Black & White</label>

                            <input type="radio" class="btn-check" name="color" id="color" value="color">
                            <label class="btn btn-outline-light flex-fill" for="color">Color</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Print Side</label>
                        <div class="btn-group d-flex" role="group">
                            <input type="radio" class="btn-check" name="side" id="one_side" value="One Side" required>
                            <label class="btn btn-outline-light flex-fill" for="one_side">One Side</label>

                            <input type="radio" class="btn-check" name="side" id="two_side" value="Two Side">
                            <label class="btn btn-outline-light flex-fill" for="two_side">Two Side</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Print Type</label>
                        <select class="form-select" name="type" required>
                            <option value="" disabled selected hidden>Select Type</option>
                            <option value="Normal">Normal</option>
                            <option value="Spiral">Spiral</option>
                            <option value="Staple">Staple</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file_size" class="form-label text-light">Select File Size:</label>
                        <select id="file_size" class="form-select" name="size">
                            <option value="" disabled selected hidden>Select File Size</option>
                            <option value="A4">A4</option>
                            <option value="A3">A3</option>
                            <option value="Letter">Letter</option>
                            <option value="Legal">Legal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="color_pages" class="form-label text-light">Number of Pages to Color:(Optinal)</label>
                        <input type="number" id="color_pages" class="form-control" name="color_pages" min="1" >
                    </div>

                    <div class="mb-3">
                        <label for="custom_note" class="form-label text-light">Customization Note:(Optional)</label><br>
                        <textarea id="custom_note" name="custom_note" rows="4" cols="50" placeholder="Add any special instructions here..."></textarea>
                    </div>

                    <button type="submit" class="btn w-100 py-2" style="background-color:#00B4C0; color: white; font-weight: bold; border-radius: 5px;">Upload</button>
                </form>

                <div id="addMoreFiles" style="display: none;" class="text-center mt-3">
                    <p class="text-light">Do you want to add more files to this order?</p>
                    <button onclick="addMoreFiles()" class="btn btn-warning me-2">Yes, Add More</button>
                    <button onclick="finalizeOrder()" class="btn btn-success">No, Finalize</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let orderToken = localStorage.getItem("order_id") || generateToken();
        document.getElementById("order_id").value = orderToken;

        function generateToken() {
            let token = "ORD-" + Date.now();
            localStorage.setItem("order_id", token);
            return token;
        }

        document.getElementById("uploadForm").onsubmit = function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            formData.set("order_id", orderToken);

            fetch('upload.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    document.getElementById("addMoreFiles").style.display = "block";
                });
        };

        function addMoreFiles() {
            document.getElementById("uploadForm").reset();
            document.getElementById("addMoreFiles").style.display = "none";
        }

        function finalizeOrder() {
            alert("Order finalized! Thank you.");
            localStorage.removeItem("order_id");
            window.location.href = "payment.php";
        }
    </script>


</body>

</html>