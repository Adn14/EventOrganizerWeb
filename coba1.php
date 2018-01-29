<html>
	<body>
		
		<?php
		
		$server = "localhost";
		$db = "event";
		$user = "root";
		$pass = "";
		$query2 = "SELECT * FROM bagian;";
		$query3 = "SELECT * FROM member;";
		$koneksi = mysqli_connect($server,$user,$pass,$db);
		$result2 = mysqli_query($koneksi, $query2);
		$result3 = mysqli_query($koneksi, $query3);

		 if(isset($_POST['filter'])){
      	$tglawl = $_POST['tgl1'];
        $tglfin = $_POST['tgl2'];
        $bag = $_POST['bag'];
        $id = $_POST['nam'];

      	
        $opsb=$bag;
        $opsn=$id;

        $query = "SELECT member.nama_member, bagian.bagian , wilayah.wilayah, event.nama_event, event.tayang, detail_tampil.bayaran FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event INNER JOIN wilayah ON wilayah.id_wilayah = event.id_wilayah WHERE member.id_member = detail_tampil.id_member AND event.tanggal_tayang>='$tglawl' AND event.tanggal_tayang <= '$tglfin' AND member.nama_member = '$id' AND bagian.bagian = '$bag';";
        
      }else{
       
        $opsh='';
        $opsb='';
        $opsn='';
        $id = ''; 

        $query = "SELECT member.nama_member, bagian.bagian , wilayah.wilayah, event.nama_event, event.tayang, detail_tampil.bayaran FROM member INNER JOIN detail_tampil ON member.id_member = detail_tampil.id_member  INNER JOIN bagian ON member.id_bagian = bagian.id_bagian INNER JOIN departmen ON bagian.id_department = departmen.id_departmen INNER JOIN `event` ON event.id_event = detail_tampil.id_event INNER JOIN wilayah ON wilayah.id_wilayah = event.id_wilayah WHERE member.id_member = detail_tampil.id_member AND member.nama_member = '$id'  ;";
      }

		?>
		<Form method="POST" action="#">
        <p class="username login">Hari</p>
        <p class="username login">Dari</p>
        <input type="date" name="tgl1"><br><br>
        <p class="username login">Sampai</p>
        <input type="date" name="tgl2"><br><br>
        
        <br><br>
        <br><br>
        <p class="username login">Posisi</p>
        <select id="combo1"  name="bag">
          <option value='<?php echo $opsb?>'> <?php echo $opsb?> </option>
          <?php
            while ($row = mysqli_fetch_assoc($result2)) {
              echo "<option selected='selected' value='" . $row["bagian"] . "'>" . $row["bagian"] . "</option>";
            }
          ?>
        </select>

        <br>
       
        <br>
        <p class="username login">Nama Member</p>
        <select id="combo2" name="nam">
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

      
      
      
		    
			
			<select id="combo2" >
		   	 	<option value="yes">yes</option>
		    	<option selected="selected" value="no">no</option>
			</select>

		<script>
		   $(document).ready(function(){
		   			
		   		$('#combo1').change(function(){
		   			window.location = 'coba1.php?posisi='+ $(this).prop("value");
		   		})

			});
		</script>

		<?php
			if($_GET['posisi']!=1){
				$query3 = "SELECT * FROM member INNER JOIN bagian ON member.id_bagian = bagian.id_bagian WHERE bagian.bagian = 'Drummer';";
			}
		?>
	</body>

</html>