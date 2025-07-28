<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="background">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 bg-light p-5 rounded-4 shadow-lg">
      <h1 class="text-center">Welcome</h1>
      <p class="text-center">Admin Login Page</p>
      
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
      <?php } ?>
      
      <form action="Adminlogin.php" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" required>
          <div id="emailHelp" class="form-text">Only Admin can Login.</div>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="password" required>
        </div>
        
        <div class="d-flex justify-content-between">
         
        </div>
        
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
