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
      <h4>Personal</h4>
    </div>
  <div class="panel-body">
    <table class="table" style="color:white">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Department</th>
        <th>Rek</th>
        <th>Koordinator</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Ardian</td>
        <td>Dokumentasi</td>
        <td>123434523</td>
        <td>Koordinator</td>
        <td>Active</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Ekky</td>
        <td>Dokumentasi</td>
        <td>51351351345</td>
        <td>-</td>
        <td>Active</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Rino</td>
        <td>Dokumentasi</td>
        <td>124242152442</td>
        <td>-</td>
        <td>Active</td>
      </tr>
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
    <Form method="POST" action="#">
        <p class="username login">Nama Wilayah</p>
        <input type="text" name="nama">
        <p class="username login">Event</p>
        <input type="password" name="event">
        <p class="username login">Hari</p>
        <input type="password" name="hari">
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

</body>

</html>