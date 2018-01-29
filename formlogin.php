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
      <a class="brand" href="index.php"><img src="images/logo.png" width="120px" height="50px"><br></a>
    </div>
  </div>
</nav>

<center><div class="row form">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h4>Sign in</h4>
		</div>
	<div class="panel-body">
		<img src="images/logo.png" width="50%"><br><br>
			<form method="POST" action="proseslogin.php">
				<p class="username login">Username</p>
				<input type="text" name="nama"><br>
				<p class="username login">Password</p>
				<input type="password" name="pass"><br><br>
				<button type="submit" name="submit" class="btn-primary">Sign in</button>
			</form>
	</div>
	</div>
	</div>
	<div class="col-md-4"></div>
</div>


<footer class="container-fluid bg-4 text-center">
	<span class="text-right"><img src="images/logo.png" width="120px" height="50px"></span>
	<br><br>
	<p>Copyright © M Event Organizer.  All Rights Reserved.</p>
</footer>

</body>

</html>