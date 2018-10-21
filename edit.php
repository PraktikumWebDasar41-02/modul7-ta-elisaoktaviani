<?php
	session_start();
	$konek = mysqli_connect('localhost','root','','databasesiswa');
	$nim = $_SESSION["nim"];
	$simpan = "SELECT * FROM dataprofil WHERE nim = $nim";
 	$lihat = mysqli_query($konek,$simpan);
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body bgcolor="#aac4ef">
		<h3>Edit Page</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<table border="2">
					<?php while ($data = mysqli_fetch_array($lihat)) { ?>
				<tr>
					<td> Nim </td>
					<td>:</td>
					<td><?php echo $data['nim'];?></td>
				</tr>
				<tr>
					<td> Nama </td>
					<td>:</td>
					<td><input type="text" name = "nama" value="<?php echo $data['nama'];?>" size="30"></td>
				</tr>
				<tr>
					<td> Tanggal Lahir </td>
					<td>:</td>
					<td><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>"></td>
				</tr>
				<tr>
					<td> Jenis Kelamin </td>
					<td>:</td>
					<td>
						<select name ="jenis_kelamin">
						<option value="Laki-Laki"
						<?php if ($data['jenis_kelamin'] == 'Laki-Laki') {
							echo "selected";
						}?>>Laki-Laki</option>
						<option value="Perempuan"		
						<?php if ($data['jenis_kelamin'] == 'Perempuan') {
							echo "selected";
						}?>>Perempuan</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td>Program Studi</td>
					<td>:</td>
					<td>
						<select name="program_studi">
                        <option value="D3 Manajemen Informatika"
							<?php if ($data['program_studi'] == 'D3 Manajemen Informatika') {
								echo "selected";
							}?>>D3 Manajemen Informatika</option>
							<option value="D3 Teknik Telekomunikasi"
							<?php if ($data['program_studi'] == 'D3 Teknik Telekomunikasi') {
								echo "selected";
							}?>>D3 Teknik Telekomunikasi</option>
							<option value="Sistem Informasi"
							<?php if ($data['program_studi'] == 'Sistem Informasi') {
								echo "selected";
							}?>>Sistem Informasi</option>
							<option value="Teknik Industri"
							<?php if ($data['program_studi'] == 'Teknik Industri') {
								echo "selected";
							}?>>Teknik Industri</option>
							<option value="Desain Interior"
							<?php if ($data['program_studi'] == 'Desain Interior') {
								echo "selected";
							}?>>Desain Interior</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Fakultas</td>
					<td>:</td>
					<td>
                        <input type="radio" name="fakultas" value="Fakultas Ilmu Terapan"
						<?php if ($data['fakultas'] == 'Fakultas Ilmu Terapan') {
							echo "checked";
						}?>>Fakultas Ilmu Terapan
						<input type="radio" name="fakultas" value="FRI"
						<?php if ($data['fakultas'] == 'FRI') {
							echo "checked";
						}?>>Fakultas Rekayasa Industri
						<input type="radio" name="fakultas" value="FIK"
						<?php if ($data['fakultas'] == 'FIK') {
							echo "checked";
						}?>>Fakultas Industri Kreatif
						<input type="radio" name="fakultas" value="FIF"
						<?php if ($data['fakultas'] == 'FIF') {
							echo "checked";
						}?>>Fakultas Informatika
						<input type="radio" name="fakultas" value="Fakultas Komunikasi Bisnis"
						<?php if ($data['fakultas'] == 'Fakultas Komunikasi Bisnis') {
							echo "checked";
						}?>>Fakultas Komunikasi Bisnis
					</td>
				</tr>
				<tr>
					<td> Asal </td>
					<td>:</td>
					<td><input type="text" name = "asal" value="<?php echo $data['asal'];?>"></td>
				</tr>
				<tr>
					<td> Motto Hidup </td>
					<td>:</td>
					<td><textarea name="moto"><?php echo $data['moto']; ?></textarea></td>
				</tr>
				<tr>
					<td><center><input type="submit" name="kembali" value="Kembali Ke Home"></center></td>
					<td colspan="2"><center><input type="submit" name="update" value="Update"></center></td>
				</tr>
				<?php }
				if (isset($_POST['update'])) {
					$nama = $_POST['nama'];
					$tanggal_lahir = $_POST['tanggal_lahir'];
					$jenis_kelamin= $_POST['jenis_kelamin'];
					$program_studi = $_POST['program_studi'];
					$fakultas = $_POST['fakultas'];
					$asal = $_POST['asal'];
					$moto = $_POST['moto'];
						$update = "UPDATE data SET nama = '$nama',  tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', program_studi = '$program_studi', fakultas = '$fakultas', asal = '$asal', moto_hidup = '$moto_hidup' WHERE nim = '$nim'";
							if (mysqli_query($konek,$update)) {
							    echo "Data Anda Berhasil Terupdate";
								header("Location:home.php");
								}
								else{
								echo "Data Anda Gagal Terupdate";
								}
				}
				if (isset($_POST['kembali'])) {
					header("Location:home.php");
				}
				?>
			</form>
		</table>
	</center>
</body>
</html>
