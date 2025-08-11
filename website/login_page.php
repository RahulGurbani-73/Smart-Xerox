<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="background">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 bg-light p-5 rounded-4 shadow-lg">
      <h1 class="col text-center">Welcome</h1>
      <p class="col text-center">Admin Login Page</p>
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
      <?php } ?>
      <form action="login.php" method="post">
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
            <a href="Registration_page.php">Create Account</a>
          </div>
        </div>
        <div class="md-3 align-content-center text-center"><button type="submit"   class="btn btn-primary"><a href="index.php" >Login</a> </button></div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>