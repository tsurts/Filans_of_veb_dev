<?php 
include('fun/db.php');
include('fun/css.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qori Airlines - Login/Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <!-- Link your custom font here -->
  <link href="css/your-font.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 tetri" style="max-width: 400px;">
  <h2 class="mb-4 text-center" style="font-family: 'YourFont', sans-serif;">Login</h2>
  <form>
    <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Password</label><input type="password" class="form-control"></div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <hr>
    <h4 class="mb-3 text-center" style="font-family: 'YourFont', sans-serif;">Register</h4>
    <div class="mb-3"><label class="form-label">Name</label><input type="text" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Password</label><input type="password" class="form-control"></div>
    <button type="submit" class="btn btn-secondary w-100">Register</button>
  </form>
</div>
<a href="index.php">Go Back</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>