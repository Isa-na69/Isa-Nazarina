<title>Layanan Pengaduan Masyarakat</title>
<link rel="shortcut icon" href="img/short.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">


	<body style="background: linear-gradient(to bottom, #696969 50%, #696969 100%);">
<div class="card" style="padding: 18px; width: 50%; margin: 0 auto; margin-top: 2%;">
	<h3 style="text-align: center;" class="grey-text">Daftar</h3>
			<form method="POST">
		<div class="input_field">
			<label for="nik">NIK</label>
			<input id="nik" type="number" name="nik" required>
		</div>
		<div class="input_field">
			<label for="nama">Nama</label>
			<input id="nama" type="text" name="nama" required>
		</div>
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<div class="input_field">
			<label for="telp">Nomor Telepon</label>
			<input id="telp" type="number" name="telp" required>
		</div>
				<div class="input-field">
					<input type="submit" name="simpan" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
			include 'conn/koneksi.php';
				if(isset($_POST['simpan'])){
					$password = md5($_POST['password']);

					$query= mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					if($query){
						echo "<script>alert('tes')</script>";
						header ('location:index.php');
					}
				}
			 ?>
            <a href="index.php" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
			</body>