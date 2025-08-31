<?php 
session_start();

include('func.php');
include('fun/db.php');
include('fun/css.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qori Airlines - Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg fixed-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Qori Airlines</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" onclick="page_changer('private_planes.php')">Private Planes</a></li>
        <li class="nav-item"><a class="nav-link" onclick="page_changer('hotels.php')">Hotels</a></li>
        <?php if ($_SESSION['user'] == "active") { ?>
          <li class="nav-item"><a class="nav-link" href="fun/check.php?leave=1">Leave</a></li>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              My Profile
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">My Information</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
            </ul>
          </div>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="login_register.php">Login/Register</a></li>
        <?php } ?>
        <li class="nav-item"><a class="nav-link" onclick="page_changer('admin.php')">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="hero-section">
  <div class="hero-content text-center text-white">
    <h1>Let Your Career Take Off</h1>
    <p>Explore the world with Qori Airlines</p>
  </div>
</div>

<!-- Main Info Displayed -->
<div class="container py-5">
  <div class="tetri">
    <div class="main_page"></div>
  </div>
</div>


<div class="container pb-5">
  <div class="tetri">
    <p>Welcome to Qori Airlines – we bring the world closer to you.</p>
  </div>
</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include('scripts.php'); ?>
</body>
</html>
