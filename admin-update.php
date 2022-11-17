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
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container">
    <a class="navbar-brand" href="admin-home.php" id="nav">LANMAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active"  style="margin-left: 10px; color: blue;" aria-current="page" href="admin-home.php">Home</a>
        <a class="nav-link active"  style="margin-left: 10px;" aria-current="page" href="admin-ratting.php">Ratting</a>

        <!-- login user -->
        <button type="button" class="btn btn-primary" style="margin-left: 820px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><a href="logout.php" style="text-decoration: none; color:white;">LOGOUT</a></button>
      </div>
    </div>
  </div>
        </nav>


      <div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
      <?php
        include "config.php";
        $id_pelaporan= $_GET['id_pelaporan'];
        $sql = mysqli_query($conn, "SELECT * FROM tbaspirasi where id_pelaporan='$id_pelaporan'");
        $data = mysqli_fetch_array($sql);
        ?>
			<form action="admin-update2.php" method="POST" action="" autocomplete="off">
  <fieldset>
  <div class="p-3 mb-2 bg-dark text-white"><h4>FORM ADMIN</h4></div>
  <div class="mb-3">
      <input type="hidden" name="id_pelaporan" class="form-control" value="<?php echo $data['id_pelaporan'];?>">
      <label for="Select" class="form-label" style="color: white;">Status</label>
      <select id="Select" name="status" class="form-select" value="<?php echo $data['status']; ?>">
        <option>Belum di Proses</option>
        <option>Sudah di Proses</option>
      </select>
    </div>

    <div class="mb-3">
		<label for="TextInput" class="form-label" style="color: white;">Upload Gambar</label>
		<input class="form-control" id="gambar" type="file" name="gambar" value="<?php echo $data['gambar']; ?>">
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