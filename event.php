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
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION['nama'])){
  echo "Access Denied !<br>";
}
else{
$server = "localhost";
$db = "event";
$user = "root";
$pass = "";
$koneksi = mysqli_connect($server,$user,$pass,$db);

if(!$koneksi){
  die("Koneksi gagal dilakukan".mysql_error());
}

/*if(isset($_POST['wilayah'])){
  $event = $_POST['event'];
  $query = "INSERT INTO event (id_wilayah,wilayah,status) VALUES (NULL,'".$wilayah."',1)";
  $result = mysqli_query($koneksi, $query);
  $timenow = date("Y-m-d");
  $query = "INSERT INTO info (id_info,tanggal_edit,id_member) VALUES (NULL,'".$timenow."','".$username."')";
  $result = mysqli_query($koneksi, $query);
}*/

$i = 0;
$query = "SELECT * FROM event";
$result = mysqli_query($koneksi, $query);
$count = mysqli_num_rows($result);
$query = "SELECT event.id_event,event.nama_event,event.jam_mulai,event.jam_akhir,event.tayang,event.status,wilayah.wilayah FROM wilayah INNER JOIN event ON wilayah.id_wilayah = event.id_wilayah LIMIT $i,1";
$result = mysqli_query($koneksi, $query);
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

<div class="row form">
  <div class="col-md-1"></div>
  <div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4>Event</h4>
    </div>
  <div class="panel-body">
    <table class="table" style="color:white">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Kota</th>
        <th>Event</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($i < $count){
    $row = mysqli_fetch_row($result);
    ?>
    <tr>
      <td><?php echo $i+1 ?></td>
      <td><?php echo "$row[6]" ?></td>
      <td><?php echo "$row[1]" ?></td>
      <td><?php echo "$row[4]" ?></td>
      <td><?php echo "$row[2] - $row[3]" ?></td>
      <td><?php if($row[5] == 1){
          echo "Active";
        }
        else{
          echo "Inactive";
        }
        ?></td>
    </tr>
    <?php
    $i++;
    $query = "SELECT event.id_event,event.nama_event,event.jam_mulai,event.jam_akhir,event.tayang,event.status,wilayah.wilayah FROM wilayah INNER JOIN event ON wilayah.id_wilayah = event.id_wilayah LIMIT $i,1";
    $result = mysqli_query($koneksi, $query);
}
    ?>
    </tbody>
  </table>
  </div>
  </div>
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-5">
    <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4>Data Baru</h4>
    </div>
  <div class="panel-body text-center">
    <Form method="POST" action="event.php">
        <p class="username login">Nama Wilayah</p>
        <input type="text" name="nama">
        <p class="username login">Event</p>
        <input type="password" name="event">
        <p class="username login">Hari</p>
        <select>
          <option value="senin">Senin</option>
          <option value="selasa">Selasa</option>
          <option value="rabu">Rabu</option>
          <option value="kamis">Kamis</option>
          <option value="jumat">Jumat</option>
          <option value="sabtu">Sabtu</option>
          <option value="minggu">Minggu</option>
        </select>
        <p class="username login">Waktu</p>
        <input type="password" name="waktu"><br><br>
        <button type="submit" name="submit" class="btn-primary">Tambah</button>
      </form>
  </div>
  </div>
  </div>
  <div class="col-md-1"></div>
</div>


<footer class="container-fluid bg-4 text-center">
	<span class="text-right"><img src="images/logo.png" width="120px" height="50px"></span>
	<br><br>
	<p>Copyright © M Event Organizer.  All Rights Reserved.</p>
</footer>
<?php
}
?>
</body>

</html>