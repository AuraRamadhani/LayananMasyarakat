<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_POST['cek'])) {
    $nik = $_POST['nik'];
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $jenis_aspirasi = $_POST['jenis_aspirasi'];
    $laporan = $_POST['laporan'];
    $gambar = $_POST['gambar'];
 
    $sql = "SELECT * FROM tbuser WHERE nik='$nik'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $sql = "INSERT INTO tbaspirasi (id, tanggal, lokasi, jenis_aspirasi, laporan, gambar, nik)
                    VALUES ('$id', '$tanggal', '$lokasi', '$jenis_aspirasi', '$laporan', '$gambar','$nik')";
            $result = mysqli_query($conn, $sql);
            if ($result) {

              $id = "";
              $tanggal = "";
              $lokasi = "";
              $jenis_aspirasi = "";
              $laporan = "";
              $gambar = "";
              $nik = "";
              header("location:user-tracking.php");
            } 
              
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nik'] = $row['nik'];
        header("Location: user-tentang.php");
    } else {
        echo "<script>alert('NIK Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 <!-- cara memasukkan data dengan cara cek data lain dari database yang berbeda(syarat) menggunakan percabangan -->



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Hello, world!</title>
  </head>
  <body style="background-color:#343a40;">
    
  <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container">
    <a class="navbar-brand" href="user-home.php" id="nav">LANMAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active"  style="margin-left: 10px; " aria-current="page" href="user-home.php">Home</a>
        <a class="nav-link active"  style="margin-left: 10px; color:grey;" aria-current="page" href="user-aspirasi.php">Pengajuan</a>
        <a class="nav-link active"  style="margin-left: 10px;" aria-current="page" href="user-tracking.php">Tracking</a>

        <!-- login user -->
        <button type="button" class="btn btn-primary" style="margin-left: 820px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><a href="logout.php" style="text-decoration: none; color:white;">LOGOUT</a></button>
      </div>
    </div>
  </div>
        </nav>


      <div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
			<form method="POST" action="" autocomplete="off">
  <fieldset>
  <div class="p-3 mb-2 bg-dark text-white"><h4>FORM ASPIRASI MASYARAKAT</h4></div>

    <?php


function randomString($length)
{
    $str        = "";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
    
}

  echo "<div class='alert alert-primary' role='alert' style='margin-right:500px; margin-top:30px; margin-bottom:-10px;'>
  <label for='TextInput' id='id_aspirasi' class='form-label pt-3' style='color:black; margin-top:-50px; margin-bottom:-50px;'><strong>ID Aspirasi : </strong></label>" ." <label id='p'>".randomString(5)."</label>";  
?>
<i class='fas fa-copy' onclick="jscopy('p')" style="margin-left:570px; color:black;"></i>
</div>
 
<!-- copy -->
  <script>

function jscopy(elementID){
var jc = document.getElementById(elementID).textContent;
cp(jc);
}
function cp(jc) {
   var el = document.createElement('textarea');
   el.value = jc;
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   el.select();
   document.execCommand('copy');
   document.body.removeChild(el);  
   document.getElementById("PesanCopy").innerHTML = el.value;
  }
</script><br><br>

<!--akhir copy -->


    <div class="mb-3" style="width: 500px;">
      <label for="TextInput" class="form-label pt-3" style="color: white;">ID Aspirasi</label>     
      <input type="text" id="TextInput" name="id" class="form-control" placeholder="Masukkan ID Aspirasi" required>
    </div>

    <div class="mb-3" style="width: 500px;">
      <label for="TextInput" class="form-label pt-3" style="color: white;">NIK</label>     
      <input type="number" id="TextInput" name="nik" class="form-control" placeholder="Masukkan NK" required>
    </div>

    <div class="mb-3">
		<label for="date" class="form-label" style="color: white;">Tanggal</label>
    	<input type="date" id="date" class="form-control" style="width: 500px;" name="tanggal" required>
	</div>

  
  <div class="mb-3" >
      <label for="TextInput" class="form-label" style="color: white;">Lokasi</label>
      <input type="text" id="TextInput" name="lokasi" class="form-control" placeholder="input">
    </div>

  <div class="mb-3">
      <label for="Select" class="form-label" style="color: white;">Jenis Aspirasi</label>
      <select id="Select" name="jenis_aspirasi" class="form-select">
        <option>Keamanan</option>
        <option>Kebersihan</option>
        <option>Keadilan</option>
      </select>
    </div>


    <div class="mb-3">
      <label for="TextInput" class="form-label pt-3" style="color: white;">Laporan Pengaduan</label>
  		<textarea class="form-control" name="laporan" placeholder="Ketikan sesuatu.." id="floatingTextarea"></textarea>
    </div>

	<div class="mb-3">
		<label for="TextInput" class="form-label" style="color: white;">Upload Gambar</label>
		<input class="form-control" id="gambar" type="file" name="gambar">
	</div>

  <div class="mb-5">
      <label for="Select" class="form-label" style="color: white;">Status</label>
      <select class="form-select" aria-label="Disabled select example" name="status" disabled>
        <option>Belum di proses</option>
      </select>
    </div>


	
   
  </fieldset>

    <button type="reset" class="btn btn-danger" style="margin-bottom: 50px; margin-right:20px; margin-top:20px;">Delete</button>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 50px; margin-right:20px; margin-top:20px;" name="cek">Submit</button>
  </fieldset>
</form>


			</div>
		</div>
	</div>
    



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>