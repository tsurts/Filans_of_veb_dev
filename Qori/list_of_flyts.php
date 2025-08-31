<?php
session_start();
include('fun/db.php');
include('func.php');  
?>

<h1 class="mb-4">Search Flights</h1>

<form class="row g-3 mb-5">
  <div class="col-md-4">
    <label class="form-label">From</label>
    <select class="form-select" id="first_county" onchange="first_con()">
      <option <?php if(isset($washla)) { ?> selected <?php } ?>>Choose city</option>
      <?php 
        $sql="SELECT * from country WHERE act = '1'";
        $r= mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($r)) {
      ?>
        <option value="<?= $row['id'] ?>" <?php if($first_county == $row['id']) { ?> selected <?php } ?>>
          <?= $row['country'] ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">To</label>
    <select class="form-select" id="second_county" onchange="second_con()">
      <option <?php if(isset($washla)) { ?> selected <?php } ?>>Choose city</option>
      <?php 
        $sql="SELECT * from country WHERE act = '1'";
        $r= mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($r)) {
      ?>
        <option value="<?= $row['id'] ?>" <?php if($second_county == $row['id']) { ?> selected <?php } ?>>
          <?= $row['country'] ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4 align-self-end">
    <button type="button" onclick="clearinputs()" class="btn btn-primary w-100">Clear</button>
  </div>
</form>

<h2 class="mb-3">Available Flights</h2>
<div id="flights-list" class="row">

<?php 
if(isset($_GET['second_county'])) {
  $sql = "SELECT
            c1.country AS origin_country,
            a1.name AS origin_airport,
            c2.country AS destination_country,
            a2.name AS destination_airport,
            r.id AS flight_id
          FROM reisebi r
          JOIN aeroports a1 ON r.aeroport_a = a1.id
          JOIN country c1 ON a1.country_id = c1.id
          JOIN aeroports a2 ON r.aeroport_b = a2.id
          JOIN country c2 ON a2.country_id = c2.id
          WHERE r.q_a = '$first_county' AND r.q_b = '$second_county'";
  $r = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($r)) {
    $asafreni_q = $row['origin_country'];
    $asafreni_aeroport = $row['origin_airport'];
    $dasafreni_q = $row['destination_country'];
    $dasafreni_aeroport = $row['destination_airport'];
    $reisis_id = $row['flight_id'];
?>
  <div class="col-md-4 flight-card mb-3">
    <div class="card">
      <img src="images/<?= $dasafreni_q ?>.jpg" class="card-img-top" alt="Flight image">
      <div class="card-body">
        <h5 class="card-title">Flight <?= $reisis_id ?></h5>
        <p class="card-text">From: <?= $asafreni_aeroport ?> to <?= $dasafreni_aeroport ?><br>Price: $199</p>
        <a href="yidvis_momenti.php?flight_id=<?= $reisis_id ?>" class="btn btn-outline-dark">Book</a>
      </div>
    </div>
  </div>
<?php 
  }
} else {
  $meramdene_gamoitanos = ($page_reloader - 1) * 6;
  $sql = "SELECT
            c1.country AS origin_country,
            a1.name AS origin_airport,
            c2.country AS destination_country,
            a2.name AS destination_airport,
            r.id AS flight_id
          FROM reisebi r
          JOIN aeroports a1 ON r.aeroport_a = a1.id
          JOIN country c1 ON a1.country_id = c1.id
          JOIN aeroports a2 ON r.aeroport_b = a2.id
          JOIN country c2 ON a2.country_id = c2.id
          LIMIT $meramdene_gamoitanos, 6";
  $r = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($r)) {
    $asafreni_q = $row['origin_country'];
    $asafreni_aeroport = $row['origin_airport'];
    $dasafreni_q = $row['destination_country'];
    $dasafreni_aeroport = $row['destination_airport'];
    $flight_id = $row['flight_id'];
?>
  <div class="col-md-4 flight-card mb-3">
    <div class="card">
      <img src="images/<?= $dasafreni_q ?>.jpg" class="card-img-top" alt="Flight image">
      <div class="card-body">
        <h5 class="card-title">Flight <?= $flight_id ?></h5>
        <p class="card-text">From: <?= $asafreni_aeroport ?> to <?= $dasafreni_aeroport ?><br>Price: $199</p>
        <a href="yidvis_momenti.php?flight_id=<?= $flight_id ?>" class="btn btn-outline-dark">Book</a>
      </div>
    </div>
  </div>
<?php }} ?>
</div>
