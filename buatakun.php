<?php
include 'auth.php';
$crud = new auth();
$crud->koneksi();
$crud->isLoggedIn();  
if (isset($_POST['buatakun'])) {
    $data = array(
        'username'=>$_POST["username"],
        'nama'=>$_POST["nama"],
        'email'=>$_POST["email"],
        'umur' => $_POST["umur"],
        'tb' => $_POST["tb"],
        'bb' => $_POST["bb"],
        'no_hp'=>$_POST["nohp"],
        'password' =>password_hash($_POST["pass2"], PASSWORD_DEFAULT),
        'status' => "user"
        ); 
        $crud->cekakun($_POST['username'],$_POST['email'],$_POST['nohp'],$data,'user');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Certainty Factor - Diagnosa Diabetes</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Certainty Factor</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav m-auto">
                        <a class="nav-link active mx-4" href="index.php">Home</a>
                        <a class="nav-link mx-4" href="diagnosa.php">Diagnosa</a>
                        <a class="nav-link mx-4" href="keterangan.php">Keterangan</a>
                        <a class="nav-link mx-4" href="tentang.php">Tentang</a>
                    </div>
                    <div class="navbar-nav m-auto">
                        <a class="nav-link mx-4" href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </nav>

    <!--form login-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm col-md-8">
                <div class="position-relative top-50 start-50 translate-middle">
                    <div class="p-5 mb-5 rounded card shadow" >
                        <h1 class="mb-4" align="center">Buat akun</h1>
                        <form action="" method="post" class="row" id="myform" oninput='pass2.setCustomValidity(pass2.value != pass1.value ? "Password tidak cocok bos." : "")'>
                            <div class="col input-group-sm">
                                <i class="fas fa-user-alt"></i>
                                <label for="inputEmail" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username..." required>
                            </div>
                            <div class="col input-group-sm">
                                <i class="fas fa-user-alt"></i>
                                <label for="inputEmail" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap..." required>
                            </div>
                            <div class="input-group-sm mt-3">
                                <i class="fas fa-envelope"></i>
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <div class="input-group-sm mt-3">
                                <i class="fas fa-baby-carriage"></i>
                                <label for="inputEmail" class="form-label">Umur</label>
                                <input type="text" name="umur" id="umur" class="form-control" placeholder="Umur..." required>
                            </div>
                            <div class="input-group-sm mt-3">
                                <i class="fas fa-line-height"></i>
                                <label for="inputEmail" class="form-label">Tinggi badan</label>
                                <input type="text" name="tb" id="tb" class="form-control" placeholder="Tinggi badan..." required>
                            </div>
                            <div class="input-group-sm mt-3">
                                <i class="fas fa-weight"></i>
                                <label for="inputEmail" class="form-label">Berat badan</label>
                                <input type="text" name="bb" id="bb" class="form-control" placeholder="Berat badan..." required>
                            </div>
                            <div class="input-group-sm mt-3">
                                <i class="fas fa-phone-square"></i>
                                <label for="inputEmail" class="form-label">No.hp</label>
                                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No.hp..." required>
                            </div>
                            <div class=" mb-5 mt-3" >
                                <i class="fas fa-key"></i>
                                <label for="inputPassword4" class="form-label mt-2">Password</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Password..." required>
                                    <div class="input-group-append input-group-sm">
                                        <!-- pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                        <span id="mybutton" onclick="change()" class="input-group-text input-group-sm">
                                            <!-- icon mata bawaan bootstrap  -->
                                            <i class="fas fa-eye fa-lg"></i>
                                        </span>
                                    </div>
                                </div>
                            <div class="mt-3" >
                                
                                <i class="fas fa-key"></i>
                                <label for="inputPassword4" class="form-label mt-2">Confirm Password</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Password...">
                                    <div class="input-group-append input-group-sm">
                                        <!-- pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                        <span id="mybutton2" onclick="change2()" class="input-group-text input-group-sm">
                                            <!-- icon mata bawaan bootstrap  -->
                                            <i class="fas fa-eye fa-lg"></i>
                                        </span>
                                    </div>
                                 </div>
                                </div>
                            </div>
                            <div class="col text-center d-grid gap-2">
                                <button type="submit" name="buatakun"  class="btn btn-dark">Buat Akun</button><br>
                        </form>
                                <form action="" method="get">
                                    <a class="btn btn-border" href="login.php">Kembali</a><br>
                                <form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('pass1').type;
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass1').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<i class="fas fa-eye-slash fa-lg"></i>`;
                }
      
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass1').type = 'password';

                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<i class="fas fa-eye fa-lg"></i>`;
                }
            }
            // membuat fungsi change
            function change2() {
    
    // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
    var x = document.getElementById('pass2').type;
    if (x == 'password') {

        //ubah form input password menjadi text
        document.getElementById('pass2').type = 'text';
        
        //ubah icon mata terbuka menjadi tertutup
        document.getElementById('mybutton2').innerHTML = `<i class="fas fa-eye-slash fa-lg"></i>`;
    }

    else {

        //ubah form input password menjadi text
        document.getElementById('pass2').type = 'password';

        //ubah icon mata terbuka menjadi tertutup
        document.getElementById('mybutton2').innerHTML = `<i class="fas fa-eye fa-lg"></i>`;
    }
}
        </script>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


 
</body>

</html>