<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Web Layanan Masyarakat</title>
  </head>
  <body style="background-color:#343a40;">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-5">
               <div class="card">
                <div class="card-header">HALAMAN LOGIN ADMIN</div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                    
                            <label for="text" style="margin-bottom: 12px;">Nama Lengkap</label>
                            <input type="text" style="margin-bottom:20px;" name="username" id="username" class="form-control" required>
            
                            <label for="text" style="margin-bottom: 10px;">Password</label>
                            <input type="password" style="margin-bottom:15px;" name="password" id="password" class="form-control" required>

                            <p for="text" style="margin-bottom: 10px;">Masuk sebagai User? <a href="login1.php">User</a></p>
                        
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary" style="margin-top:20px; " value="cek" name="cek" type="button">LOGIN</button>
                        </div>

                    </form>
                    <!-- cek db -->
                    <!-- cek db ke login -->
                    <?php 
                        if(isset($_POST['cek'])){
                        include 'config.php';
                        $cek = mysqli_query($conn, "SELECT * FROM tbadmin WHERE username = '".$_POST['username']."' AND
                        password = '".$_POST['password']."'"); 
                        $row = mysqli_fetch_array($cek);
                        $count = mysqli_num_rows($cek);
                
                    if($count>0){
                        session_start();
                        $_SESSION['username']=$row['username'];
                        $_SESSION['password']=$row['password'];            
            
                        header('location:admin-home.php');
                    }else{
                        die('<script>alert("Username atau Email anda salah!")</script>');
                    }
                }
            ?>
                </div>
               </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

