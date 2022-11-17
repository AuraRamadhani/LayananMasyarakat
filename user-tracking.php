
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
        <a class="nav-link active"  style="margin-left: 10px;" aria-current="page" href="user-aspirasi.php">Pengajuan</a>
        <a class="nav-link active"  style="margin-left: 10px; color:grey;" aria-current="page" href="user-tracking.php">Tracking</a>

        
        <!-- login user -->
        <button type="button" class="btn btn-primary" style="margin-left: 820px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><a href="logout.php" style="text-decoration: none; color:white;">LOGOUT</a></button>
      </div>
    </div>
  </div>
        </nav>

<!-- login user end -->
      
      </div>
    </div>

</nav>
    </div>
    </div>

<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="p-3 mb-2 bg-dark text-white"><h2>Data Aspirasi Masyarakat</h2></div>
    <nav class="navbar navbar-dark">
    <form class="d-flex" style="margin-left: 1000px;">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari" 
      value="<?php  if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        echo$cari;
                      } ?>">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
    <table style="margin-top: 50px;" class="table table-dark table-hover table-bordered" id="table">
  <thead>
    <tr align="center">
      <th scope="col">No</th>
      <th scope="col">Id Aspirasi</th>
      <th scope="col">NIK</th>
      <th scope="col">Waktu</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Jenis Aspirasi</th>
      <th scope="col">Aspirasi</th>
      <th scope="col">Gambar</th>
      <th scope="col">Status</th>
      <th scope="col">Ratting</th>     
    </tr>
    <?php
    include"config.php";
    if (isset($_POST['kirim'])) {
    $id_pelaporan = $_POST['id_pelaporan'];
    $ratting = $_POST['ratting'];
    mysqli_query($conn, "UPDATE tbaspirasi SET ratting='$ratting' WHERE id_pelaporan='$id_pelaporan'");
  } ?>
  </thead>
  <tbody>
  <?php 
		include "config.php";
    if (isset($_GET['cari'])) {
      $cari = $_GET['cari'];
      $sql = mysqli_query($conn,"SELECT * FROM tbaspirasi WHERE jenis_aspirasi LIKE '%".$cari."%' OR nik LIKE '%".$cari."%' OR status LIKE '%".$cari."%' OR tanggal LIKE '%".$cari."%'");
    }else {
      $sql = mysqli_query($conn, "SELECT * FROM tbaspirasi");
    }
    $id_pelaporan = 1;
		while ($data = mysqli_fetch_array($sql)){				
		?>
		<div class="isi">
			<tr  align="center" style="background-color:white">
				<td><?php echo $id_pelaporan++ ?></td>
				<td><?php echo $data['id']?></td>
				<td><?php echo $data['nik']?></td>
				<td><?php echo $data['tanggal']?></td>
				<td><?php echo $data['lokasi']?></td>
				<td><?php echo $data['jenis_aspirasi']?></td>
				<td><?php echo $data['laporan']?></td>
				<td><?php echo $data['gambar']?></td>
				<td><p style="color:blue"><?php echo $data['status']?></p></td>
	
        <td>
        <?php 
                                                if ($data['ratting'] == null) {
                                                ?> <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratting<?php echo $data['id_pelaporan']; ?>">
                                                Ratting
                                              </button></center> <?php
                                                    }else{
                                                        ?>
                                                <center><?= $data['ratting']; ?>
                                                </center> <?php
                                                    }
                                                ?>
        
        
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ratting<?php echo $data['id_pelaporan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ratting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="user-tracking.php" method="post">
        <input type="hidden" name="id_pelaporan" value="<?= $data['id_pelaporan']; ?>">
          <input type="radio" name="ratting"  value="Buruk"><p class="text-dark">Buruk</p>
          <input type="radio" name="ratting" value="Bagus"><p class="text-dark">Bagus</p>
          <input type="radio" name="ratting" value="Sangat Bagus"><p class="text-dark">Sangat Bagus</p>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="kirim" value="kirim">
      </form>

     


        
        
      </div>
    </div>
  </div>
</div>        
				</td>
				
			</tr>
		</div>
			<?php } ?>
    
  </tbody>
</table>
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





