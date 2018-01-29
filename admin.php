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

<div class="logo bg-1 text-center">
  
  <panel>
  <img src="images/logo.png" class="img-responsive img-rounded margin" style="display:inline" alt="Bird" width="350" height="350">
  </panel>
</div>


<footer class="container-fluid bg-4 text-center">
	<span class="text-right"><img src="images/logo.png" width="120px" height="50px"></span>
	<br><br>
	<p>Copyright © M Event Organizer.  All Rights Reserved.</p>
</footer>

</body>

</html>