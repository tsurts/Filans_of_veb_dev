<?php 
session_start();

include('func.php');

include('fun/db.php');

include('fun/css.php');

?>
<div class="container mt-4 ">
  <h1>Hotel Listings</h1>
  <div id="hotels-list" class="row mt-3">
    <!-- Hotels will be dynamically loaded from your database -->
  </div>
</div>
