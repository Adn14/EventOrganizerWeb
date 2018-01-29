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
$query2 = "SELECT * FROM bagian;";
$query3 = "SELECT * FROM member;";
$koneksi = mysqli_connect($server,$user,$pass,$db);
$result2 = mysqli_query($koneksi, $query2);
$result3 = mysqli_query($koneksi, $query3);
$total=0;

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
      	if($_POST['tgl1'] == ""){
          $tglawl = date("2017-01-01");
        }else{
          $tgl_awal = $_POST['tgl1'];
        }
        if($_POST['tgl2'] == ""){
          $tglfin = date("2030-12-31");
        }
        else{
          $tglfin = $_POST['tgl2'];
        }
        $bag = $_POST['bag'];
        $id = $_POST['nam'];

      	
        $opsb=$bag;
        $opsn=$id;

        $query = "SELECT member.nama_member, bagian.bagian , wilayah.wilayah, event.nama_event, event.tayang, detail_tampil.bayaran FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event INNER JOIN wilayah ON wilayah.id_wilayah = event.id_wilayah WHERE member.id_member = detail_tampil.id_member AND event.tanggal_tayang>='$tglawl' AND event.tanggal_tayang <= '$tglfin' AND member.nama_member LIKE '%$id%' AND bagian.bagian LIKE '%$bag%';";
        
      }else{
       
        $opsh='';
        $opsb='';
        $opsn='';
        $id = $_POST['det']; 

        $query = "SELECT member.nama_member, bagian.bagian , wilayah.wilayah, event.nama_event, event.tayang, detail_tampil.bayaran FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event INNER JOIN wilayah ON wilayah.id_wilayah = event.id_wilayah WHERE member.id_member = detail_tampil.id_member AND member.nama_member = '$id'  ;";
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
      $query = $_SESSION['kueri'] ;
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
        <p class="username login">Hari</p>
        <p class="username login">Dari</p>
        <input type="date" name="tgl1"><br><br>
        <p class="username login">Sampai</p>
        <input type="date" name="tgl2"><br><br>
        
        <br><br>
        <br><br>
        <p class="username login">Posisi</p>
        <select name="bag">
          <option value='<?php echo $opsb?>'> <?php echo $opsb?> </option>
          <?php
            while ($row = mysqli_fetch_assoc($result2)) {
              echo "<option value='" . $row["bagian"] . "'>" . $row["bagian"] . "</option>";
            }
          ?>
        </select>
        <br><br>
        
        <p class="username login">Nama Member</p>
        <select name="nam">
          <option value='<?php echo $opsn ?>'> <?php echo $opsn?> </option>
          <?php
            while ($row = mysqli_fetch_assoc($result3)) {
              echo "<option value='" . $row["nama_member"] . "'>" . $row["nama_member"] . "</option>";
            }
          ?>
        </select>
        <br><br>
        <button type="submit" name="filter" class="btn btn-primary btn-sm">Filter</button>
      </form>
  </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4>Detail Honor</h4>
     
    </div>
  <div class="panel-body">
    <table class="table" style="color:white">
    <thead>
      <tr>
        <th>No.</th>
        <th>Pelayanan</th>
        <th>Wilayah</th>
        <th>Event</th>
        <th>Tanggal</th>
        <th>Rp</th>
      </tr>
    </thead>
    <tbody>
      
      <?php 
       
      
      $_SESSION['kueri'] = $query;
      $result = mysqli_query($koneksi, $query);

      $i = 1;

      if($result){
        while($row = mysqli_fetch_assoc($result)){

?>	
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['bagian'] ?></td>
			<td><?php echo $row['wilayah'] ?></td>
			<td><?php echo $row['nama_event'] ?></td>
			<td><?php echo $row['tayang'] ?></td>
			<td><?php echo number_format($row['bayaran']) ?></td>
		</tr>
          

<?php
		$total = $total + $row['bayaran'];
      	$i = $i + 1;
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