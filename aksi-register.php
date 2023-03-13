<?php 
include 'conn/koneksi.php';
				if(isset($_POST['submit'])){
					$password = md5($_POST['password']);
					$query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					if($query){
						echo "<script>alert('Data Tesimpan')</script>";
						echo "<script>location='location:login.php'</script>";
					}
				}
			 ?>