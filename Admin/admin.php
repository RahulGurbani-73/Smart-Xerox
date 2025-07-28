<?php
// Include database connection
include "conn.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
header("Refresh:10");

// Initialize an empty result set
$res = null;

// Check if the search form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_order_id'])) {
    $search_order_id = mysqli_real_escape_string($conn, $_POST['search_order_id']);
    $res = mysqli_query($conn, "SELECT * FROM upload WHERE order_id = '$search_order_id'");
} else {
    // Default query to fetch all records
    $res = mysqli_query($conn, "SELECT * FROM upload");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Animation for the search bar */
        .input-group {
            display: flex;
            justify-content: flex-end;
            /* Moves search bar to the right */
            margin-bottom: 20px;
        }

        .search-bar {
            width: 40%;
            /* Medium size */
            max-width: 350px;
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 20px;
            outline: none;
            transition: all 0.4s ease-in-out;
            font-size: 16px;
        }

        .search-bar:focus {
            border-color: #ff9800;
            box-shadow: 0 0 15px rgba(255, 152, 0, 0.8);
            transform: scale(1.0);
            /* Slight pop effect */
            background-color: #f8f9fa;
        }

        .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #ff9800;
            transform: scale(1.05);
        }
    </style>
    <title>Admin Panel</title>
</head>

<body style="background-color: rgb(207,245,235);">
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0" style="background: rgb(24,47,51);">
        <div class="col-md-4">
            <img src="./images/logo.png" class="img-fluid" alt="" width="15%" height="15%">
        </div>
        <div class="container-fluid text-light">
            <a class="navbar-brand text-light" href="#">Hello Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="Admindashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="user_details.php">User Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="payment_status.php">Payment Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">


        <!-- Search Bar -->
        <!-- Search Bar & Title -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mx-auto">Admin Panel</h1>
            <form method="post" action="" class="d-flex">
                <input type="text" class="form-control search-bar me-3" name="search_order_id" placeholder="Enter Order ID" required>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>


        <table class="table table-bordered m-2">
            <thead>
                <tr class="text-center" style="background-color: black; color:white;">
                    <th>View</th>
                    <th>Order ID</th>
                    <th>Orin</th>
                    <th>Color</th>
                    <th>Side</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Token</th>
                    <th>Time</th>
                    <th>Accept</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>";
                ?>
                    <form method="post" action="view.php">
                        <input type="hidden" name="token" value="<?php echo $row["token"]; ?>">
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>{$row["order_id"]}</td>";
                    echo "<td>{$row["orin"]}</td>";
                    echo "<td>{$row["color"]}</td>";
                    echo "<td>{$row["side"]}</td>";
                    echo "<td>{$row["type"]}</td>";
                    echo "<td>{$row["size"]}</td>";
                    echo "<td>{$row["email"]}</td>";
                    echo "<td>{$row["firstname"]}</td>";
                    echo "<td>{$row["mobile"]}</td>";
                    echo "<td>{$row["status"]}</td>";
                    echo "<td>" . ($row['status'] == 1 ? '' : $row['token']) . "</td>";
                    echo "<td>{$row["time"]}</td>";
                    ?>
                    <td>
                        <form method="post" action="accept.php">
                            <input type="hidden" name="token" value="<?php echo $row["token"]; ?>">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    </td>
                    <td>
                        <a href="delete.php?token=<?php echo $row["token"]; ?>" class="btn btn-danger">Delete</a>
                    </td>
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>