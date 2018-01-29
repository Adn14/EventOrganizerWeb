<!DOCTYPE html>
<html>
<head>
  <title>Machung Event Organizer</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(images/home.jpg); width: 100%">

<?php

session_start();
$username = $_POST['nama'];
$password = $_POST['pass'];
$server = "localhost";
$db = "event";
$user = "root";
$pass = "";
$koneksi = mysqli_connect($server,$user,$pass,$db);
$query2 = "SELECT * FROM departmen;";
$total =0;

$result2 = mysqli_query($koneksi, $query2);

if(!$koneksi){
  die("Koneksi gagal dilakukan".mysql_error());
}

?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="brand" href="admin.php"><img src="images/logo.png" width="120px" height="50px"><br></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">         
        <li><a href="logout.php">Sign out</a></li>   
     </ul>

      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Master
      <span class="caret"></span></a>
      <ul class="dropdown-menu" style="background-color: black">
        <li><a href="wilayah.php">Wilayah</a></li>
        <li><a href="event.php">Event</a></li>
        <li><a href="bagian.php">Bagian</a></li>
        <li><a href="posisi.php">Posisi</a></li>
        <li><a href="personal.php">Personal</a></li>
      </ul>
      </li>       
        <li><a href="entryhonor.php">Entry Honor</a></li>
        <li><a href="laporan.php">Laporan Honor</a></li>
        <li><a href="pembelian.php">Pembelian</a></li>
        <li><a href="evaluasi.php">Evaluasi</a></li>
      </ul>
     
    </div>
  </div>
</nav>
<?php

      if(isset($_POST['filter'])){
        
        $dep = $_POST['dep'];
        $tglawl = $_POST['tgl1'];
        $tglfin = $_POST['tgl2'];
         $query = "SELECT member.id_member, member.nama_member, member.total FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event WHERE event.tanggal_tayang>='$tglawl' AND event.tanggal_tayang <= '$tglfin' AND departmen.departmen ='Musik' GROUP BY member.nama_member;" ;
         
         $opsb = $dep;
      }else{
        $query = "SELECT member.id_member, member.nama_member, member.total FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event GROUP BY member.nama_member;";
        
        $opsb='';
      }
      $exp_table = "honor"; // Table to export
      $mysqli = new mysqli($server, $user, $pass, $db);
      $mysqli->set_charset("utf8");
      if (!$mysqli)
      die("ERROR: Could not connect. " . mysqli_connect_error());
      // Create and open new csv file
      $csv = $exp_table . "-" . date('d-m-Y-his') . '.csv';
      $file = fopen($csv, 'w');
      // Get the table
      
      if (!$mysqli_result = mysqli_query($mysqli, $query))
      printf("Error: %s\n", $mysqli->error);
      // Get column names 
      while ($column = mysqli_fetch_field($mysqli_result)) {
      $column_names[] = $column->name;
      }

      // Write column names in csv file
      if (!fputcsv($file, $column_names))
      die('Can\'t write column names in csv file');

      // Get table rows
      while ($row = mysqli_fetch_row($mysqli_result)) {
      // Write table rows in csv files
      if (!fputcsv($file, $row))
      die('Can\'t write rows in csv file');
      }
      fclose($file);
?>
<div class="row form">
  <div class="col-md-3"></div>
  <div class="col-md-6">

    <div class="panel panel-default">
  <div class="panel-body text-center">
    <Form method="POST" action="#">
        <p class="username login">Dari</p>
        <input type="date" name="tgl1"><br><br>
        <p class="username login">Sampai</p>
        <input type="date" name="tgl2"><br><br>
        
        <br><br>
        <p class="username login">Departemen</p>
        <select name="dep">
          <option value='<?php echo $opsb ?>'> <?php echo $opsb?> </option>
          <?php
            while ($row = mysqli_fetch_assoc($result2)) {
              echo "<option value='" . $row["departmen"] . "'>" . $row["departmen"] . "</option>";
            }
          ?>
        </select>
        <br><br>
        <button type="submit" name="filter" class="btn btn-primary btn-sm">Filter</button>
        <a href="laporan.php"> <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-refresh"></span> Refresh
        </button>
        </a>
      </form>
  </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4>Daftar nama</h4>
    </div>
  <div class="panel-body">
    <table class="table" style="color:white">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Total</th>
        <th>Hapus</th>
      </tr>
    </thead>
    <tbody>
      
      <?php 
     
      $result = mysqli_query($koneksi, $query);

      $i = 1;

      if($result){
        while($row = mysqli_fetch_assoc($result)){
?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['nama_member']?></td>
            <td><?php echo $row['total']?></td>
            <form method="POST" action="detil_honor.php"> 
            <td><button type="submit" name="det" class="btn-info" value="<?php echo $row['nama_member']?>">Detail</button></td>
            </form>
          </tr>

<?php
      $i = $i + 1;
      $total = $total + $row['total'];
        }
      }


      ?>
    </tbody>
  </table>
  <h3 style="color:white">Total : Rp <?php echo number_format($total)?></h3>
  </div>
  </div>
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
    <a href="#"><div class="panel panel-default">
        <div class="panel-heading text-center">
          <a href="<?php echo "$csv" ?>"><h4>Export to CSV</h4></a>
        </div>
    </div></a>
</div>
<div class="col-md-3"></div>
</div>


<footer class="container-fluid bg-4 text-center">
  <span class="text-right"><img src="images/logo.png" width="120px" height="50px"></span>
  <br><br>
  <p>Copyright © M Event Organizer.  All Rights Reserved.</p>
</footer>

</body>

</html>