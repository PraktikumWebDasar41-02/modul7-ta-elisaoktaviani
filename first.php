<?php
	$data = mysqli_connect('localhost','root','','databasesiswa');
	$tampil = "SELECT nim,nama,program_studi FROM dataprofil";
	$tampilkan = mysqli_query($data,$tampil);
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body bgcolor="#aac4ef">
	<br> <br>
	<h2>Halaman Awal</h2><br>
	
	<table border="2">
		<form action="" method="POST">
			<tr>
				<td><input type="submit" name="Input" value="Input"></td>
				<td><input type="text" name="nim"></td>
				<td><input type="submit" name="search" value="Search"></td>

				<?php
				$tampilkan;
				if(isset($_POST['search'])){
					$nim = $_POST['nim'];
					$search ="SELECT nim,nama, program_studi FROM dataprofil WHERE nim ='$nim'";
					$tampilkan = mysqli_query($data,$search);
				}
				?>
			</tr>
			<tr>
				<td>Nim</td>
				<td>Nama</td>
				<td>Program Studi</td>
				<td>Action</td>
			</tr>
			<?php while ($dataa = mysqli_fetch_array($tampilkan)){ ?>
			<tr>
				<td><?php echo $dataa['nama'];?></td>
				<td><?php echo $dataa['nim'];?></td>
				<td><?php echo $dataa['program_studi'];?></td>
				<td><?php echo "<a href=first.php?nim=".$dataa['nim'].">Delete</a>";?></a></td>
				<td><?php echo "<a href=edit.php?nim=".$dataa['nim'].">Update</a>";?></a></td>
				<?php } ?>
			</tr>
			<tr>
				<td colspan="4"><center>
				<input type="submit" name="back" value="back">
				</center>
				</td>
			</tr>
		</form>
	</table>
</body>
</html>

<?php
	if(isset($_POST['Input'])){
		header("Location: awal.php");
	}

	if(isset($_GET['nim'])){
		$nim = $_GET['nim'];
		$delete = "DELETE FROM dataprofil where nim ='$nim'";
		$tampil = mysqli_query($data,$delete);
		if($tampil){
			header("Location:first.php");
		}
	}

	if(isset($_POST['back'])){
		header("Location:first.php");
	}

?>