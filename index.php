<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>WEB SENSOR RASPI3</title>
    
     <?php
      function refreshPage() {
      echo '<meta http-equiv="refresh" content="5">';
      }
        refreshPage();
     ?>
     
</head>

<body>
    
    <!-- FETCH DATA FROM MYSQL -->
    <?php
    include "load.php";
    include "koneksi.php";
    //untuk tabel
    $sql = "SELECT * FROM sensor ORDER by id DESC limit 6";
    $result = $koneksi->query($sql);
    //untuk dashboard
    $sql2 = "SELECT * FROM sensor ORDER by id DESC limit 1";
    $result2 = $koneksi->query($sql2);
    
    $data = mysqli_fetch_assoc($result2);
    
    $temp = $data["suhu"];
    $dist = $data["jarak"];
    $light= $data["light"];
    ?>
            
    
    <div class="container" style="text-align: center; margin-top: 30px">
        <h1><b>WEB MONITORING MULTISENSOR RASPBERRY PI 3</b></h1>
        <h2>Algoritma & Pemrograman 2 (Tyas,Umam,Syauqi)</h2>
        <h4>Memonitor Jarak, Suhu dan Cahaya</h4>
        <br><br>
        
        <div class="d-flex justify-content-center">
        <div class="card m-3 bg-danger text-white" style="width:28%">
        <div class="card-body">
            <h5 class="card-title mb-1">
            <span class="material-symbols-outlined">straighten</span>Jarak
            </h5>
            <h4 class="card-text mb-0"><?php echo $dist?> cm</h4>
        </div>
        </div>
        
        <div class="card m-3 bg-warning text-white" style="width:28%">
        <div class="card-body">
              <h5 class="card-title mb-1">
              <span class="material-symbols-outlined">device_thermostat</span>Suhu</h5>
              <h4 class="card-text mb-0"><?php echo $temp?> °C</h4>
        </div>
        </div>
        
        <div class="card m-3 bg-info text-white" style="width:28%">
        <div class="card-body">
              <h5 class="card-title mb-1">
              <span class="material-symbols-outlined">light</span>Cahaya</h5>
              <h4 class="card-text mb-0"><?php echo $light?> lux</h4>
        </div>
        </div>
        </div>
        

        <br>
        <table class="table table-hover" style="margin-top:30px">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Datetimes</th>
                    <th>Sensor Jarak</th>
                    <th>Sensor Suhu</th>
                    <th>Sensor Cahaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["datetime"]; ?>
                        </td>
                        <td>
                            <?php echo $row["jarak"]; ?> cm
                        </td>
                        <td>
                            <?php echo $row["suhu"]; ?> °C
                        </td>
                        <td>
                            <?php echo $row["light"]; ?> lx
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<script src="jquery/jquery-3.2.1.slim.min.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
