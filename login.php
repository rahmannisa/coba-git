<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Perpustakaan</title>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!--Ikon-->
        <script src="https://kit.fontawesome.com/ed8bbdb0f6.js" crossorigin="anonymous"></script>
        <!--CSS-->
        <link rel="stylesheet" href="./css/style-login.css">
        <link rel="stylesheet" href="./css/style.php">        
    </head>
    <body>
        <section class="login d-flex">
            <div class="login-left h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-6">
                        <div class="header">
                            <h1>Welcome Back</h1>
                            <p>Selamat datang kembali! Silahkan login.</p>
                        </div>
                        <div class="form-login">
                            <form action="" method="POST">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
            
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <!--INPUT-->
                                <?php
                                if(isset($_POST['login'])){
                                    session_start();
                                    include "koneksi.php";
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);

                                    $query = "SELECT * from petugas where username='$username' AND password='$password'";
                                    $ceklogin = $koneksi->query($query);

                                    if($ceklogin == true){
                                        if(mysqli_num_rows($ceklogin)==1){
                                            $b = $ceklogin->fetch_array();
                                            $_SESSION['username'] = $b['username'];
                                            header("location:menu.php");
                                        }else{
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            Username atau Password salah.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <input type="submit" class="kirim" value="Login" name="login">
                            </form>
                            <p>Belum memiliki akun? <a href="registrasi.html" class="text-decoration-none">Registrasi disini.</a></p> 
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="login-right h-100">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="./img/login1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="./img/login3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="./img/login2.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            
        </section>
        <!--JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        
    </body>
</html>