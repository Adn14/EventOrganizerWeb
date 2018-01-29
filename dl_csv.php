<html>
	<head>
		


	</head>

	<body>

				<?php
						session_start();
			            $server = "localhost";
						$db = "event";
						$user = "root";
						$pass = "";
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
			            echo "<p><a href=\"$csv\">Export to CSV</a></p>\n";
			            ?>

	</body>
</html>