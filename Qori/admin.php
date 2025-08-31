<?php 
session_start();

include('func.php');

include('fun/db.php');

include('fun/css.php');

?>
<div class="container mt-4 tetri">
  <h1>Admin Dashboard</h1>
  <ul class="nav nav-tabs mt-3">
    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#addFlights">Add Flights</a></li>
    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#addPlanes">Add Private Planes</a></li>
    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#addHotels">Add Hotels</a></li>
  </ul>
  <div class="tab-content mt-3">
    <div id="addFlights" class="tab-pane fade show active">
     
    
    <form action="gen_flyts_only_backand.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">FROM</span>
                    </div>
                    <select class="form-control" name="saidan" aria-label="Username" aria-describedby="basic-addon1">
                        <option value="">Select City</option>
                        <?php  
                                $sql = "SELECT id, country FROM country";
                                $r = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($r)) {  ?>
                                            <option value="<?=$row['id'];?>"><?=$row['country'];?></option>
                            <?php }?>
                    
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select class="form-control" name="sad" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <option value="">Select Destination</option>
                        <?php  
                                $sql = "SELECT id, country FROM country";
                                $r = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($r)) {  ?>
                                            <option value="<?=$row['id'];?>"><?=$row['country'];?></option>
                            <?php }?>
                    
                    </select>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Here</span>
                    </div>
                </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Planes</label>
                        </div>
                        <select class="custom-select" name="plane" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <?php  
                                $sql = "SELECT name,id FROM planes";
                                $r = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($r)) {  ?>
                            
                                        <option value="<?=$row['id'];?>"><?=$row['name'];?></option> 
                            
                            <?php } ?>
                        </select>
                        </div>
                    <label>Time</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Start - Finish</span>
                    </div>
                    <input type="datetime-local" aria-label="First name" name="time_start" class="form-control">
                    <input type="datetime-local" aria-label="Last name" name="time_finish" class="form-control">
                    </div>

                    <label>Price</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" name="tanxa" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    </div>
                    <button name="create" placeholder="save" value="create"> save</button>
                    </form>
                                     <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Take off</th>
        <th scope="col">Landing</th>
        <th scope="col">From -</th>
        <th scope="col">- To</th>
        <th scope="col">Price $</th>
        <th scope="col"> More Info</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $no = 1;
      $sql = "SELECT * FROM reisebi";
      $r = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($r)) {  
    ?>
      <tr style="cursor:pointer;">
        <th scope="row"><?= $no++; ?></th>
        <td><?= $row['tar_a']; ?></td>
        <td><?= $row['tar_b']; ?></td>
        <?php   
        $romeli_reisi=$row['id'];
          $saidan = $row['q_a'];
          $sql2 = "SELECT country FROM country WHERE id='$saidan'";
          $from_result = mysqli_query($conn, $sql2);
          if ($from_result) {
              $from = mysqli_fetch_assoc($from_result);
          } else {
              $from = ['country' => 'Error'];
              error_log("Query error: " . mysqli_error($conn));
          }

          $sad = $row['q_b'];
          $sql2 = "SELECT country FROM country WHERE id='$sad'";
          $to_result = mysqli_query($conn, $sql2);
          if ($to_result) {
              $to = mysqli_fetch_assoc($to_result);
          } else {
              $to = ['country' => 'Error'];
              error_log("Query error: " . mysqli_error($conn));
          }

          $reisi_id = $row['id'];
          $sql2 = "SELECT fasi FROM seats WHERE reisi_id='$reisi_id'";
          $seat_result = mysqli_query($conn, $sql2);
          if ($seat_result) {
              $seat = mysqli_fetch_assoc($seat_result);
          } else {
              $seat = ['fasi' => 'Error'];
              error_log("Query error: " . mysqli_error($conn));
          }
        ?>
        <td><?= $from['country'] ?? 'N/A'; ?></td>
        <td><?= $to['country'] ?? 'N/A'; ?></td>
        <td><?= isset($seat['fasi']) ? '$' . $seat['fasi'] : 'N/A'; ?></td>
        <td > 
          <button onclick="pop(<?= $romeli_reisi; ?>)" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="image/more-info.png" alt="Info" width="55" height="55" style="padding:0px;">
          </button>
        </td>

      </tr>
    <?php } ?>
    </tbody>
  </table>





    </div>
    <div id="addPlanes" class="tab-pane fade">
      <form>
        <div class="mb-3"><label class="form-label">Plane Model</label><input class="form-control"></div>
        <div class="mb-3"><label class="form-label">Price</label><input class="form-control"></div>
        <button class="btn btn-primary">Add Plane</button>
      </form>
    </div>
    <div id="addHotels" class="tab-pane fade">
      <form>
        <div class="mb-3"><label class="form-label">Hotel Name</label><input class="form-control"></div>
        <div class="mb-3"><label class="form-label">Location</label><input class="form-control"></div>
        <button class="btn btn-primary">Add Hotel</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>