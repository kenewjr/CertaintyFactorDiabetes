<?php
include "auth.php";
$db=new auth();
$db->koneksi();
$db->notloggedin();
$db->notcrossuser();
if (isset($_POST["simpan"])) {
    $a=base64_decode($_GET['id']);
    $data = array(
        'kode_penyakit'=>$_POST["namapenyakit"],
        'md'=>$_POST["cfpakar"]
        ); 
        $db->update($data,'pengetahuan','id_pengetahuan',$a);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/bf4a29feae.js" crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

   

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="tambahadmin.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span> Tambah Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambahgejala.php">
                    <i class="fas fa-fw fa-head-side-cough"></i>
                    <span> Tambah Gejala</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tambahpengetahuan.php">
                    <i class="fas fa-fw fa-info"></i>
                    <span> Tambah Pengetahuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambahpenyakit.php">
                    <i class="fas fa-fw fa-syringe"></i>
                    <span> Tambah Penyakit</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                     echo $_SESSION["nama"];
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form action="" method="post">
                                <button name="logout" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                                </form>
                                <?php
                                if (isset($_POST["gantipass"])) {
                                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=gantipassadmin.php">';
                                }
                                    if (isset($_POST["logout"])) {
                                        $user = new auth();
                                        $user->logout ();
                                    }
                                ?>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-14 col-md-5">
                            <div class="p-3 m-5 bg-light text-dark rounded" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0,0.2);">
                                <h1 class="mb-4" align="center">Edit Pengetahuan</h1>
                                <form action="" method="post">
                                <div class="mt-2 mb-2 col">
                                    <i class="fa-solid fa-syringe"></i>
                                    <label for="exampleFormControlInput1" class="form-label">Nama Penyakit</label>
                                    <select class="form-select" name="namapenyakit">
                                    <?php foreach ($db->select('penyakit') as $show ) { ?>
                                        <option value="<?php echo $show['kode_penyakit']?>"><?php echo $show['nama_penyakit']?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="mt-2">
                                        <i class="fa-solid fa-head-side-cough"></i>
                                        <label for="exampleFormControlInput1" class="form-label">Nama Gejala</label>
                                        <select class="form-select" name="idgejala" disabled>
                                        <?php $a=base64_decode($_GET['idgejala']); foreach ($db->selectwhere('gejala',$a,'id_gejala') as $show ) { ?>
                                        <option value="<?php echo $show['id_gejala']?>"><?php echo $show['nama_gejala']?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mt-2">              
                                        <i class="fas fa-at"></i>
                                        <label for="exampleFormControlInput1" class="form-label">Cf Pakar</label>
                                        <input type="text" name="cfpakar" class="form-control" id="exampleFormControlInput1" placeholder="Cf Pakar...">
                                    </div>
                                </div>
                                <div class="text-center">
                                <button class="mt-3 btn btn-primary" type="submit" name="simpan">simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                        <span>Copyright &copy;  Cf Pakar</span>
                        </div>
                    </div>
                 </footer>
            <!-- End of Footer -->
        </div>


    </div>
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>



                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>