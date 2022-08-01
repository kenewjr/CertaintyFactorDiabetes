<?php
// untuk memanggil file
include 'auth.php';
// untuk mendeklarasikan class menjadi variabel
$crud = new auth();
if (isset($_POST["logout"])) {
        $crud->logout ();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                        <a class="nav-link mx-4" href="index.php">Home</a>
                        <a class="nav-link mx-4" href="diagnosa.php">Diagnosa</a>
                        <a class="nav-link mx-4" href="keterangan.php">Keterangan</a>
                        <a class="nav-link active mx-4" href="tentang.php">Tentang</a>
                    </div>
                   <?php
                    $crud->isLoggedIn2();
                    ?>
                </div>
            </div>
        </nav>

        <div class="container my-2 mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Tentang Sistem</h3>
                    <hr class="my-4" />
                </div>
            </div>
        </div>

        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/wallpaper-keterangan.png" class="d-block w-100" alt="wallpaper" />

                        <div class="carousel-caption text-dark">
                            <h2 class="font-weight-bold">CERTAINTY FACTOR</h2>
                            <p>- Diagnosa Penyakit Diabetes -</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <p>
                Sistem pakar yang mampu mendiagnosa penyakit diabetes berdasarkan pengetahuan yang diberikan langsung dari pakar/ahlinya dan melalui studi literatur. Penelitian ini menggunakan metode perhitungan Certainty Factor (CF) dalam
                menghitung tingkat kepakaran. Data penelitian ini terdiri dari data gejala dan data penyakit diabetes, serta data aturan. Sistem pakar pada organisasi ditujukan untuk penambahan value, peningkatan produktivitas serta area
                manajerial yang dapat mengambil kesimpulan dengan cepat.
            </p>
            <p>Certainty Factor (CF) merupakan salah satu teknik yang digunakan untuk mengatasi ketidakpastian dalam pengambilan keputusan. Certainty Factor (CF) dapat terjadi dengan berbagai kondisi.</p>
            <p>Metode Certainty factor (CF) diusulkan oleh Shortliffe dan Buchanan pada tahun 1975. CF merupakan nilai parameter klinis yang diberikan MYCIN untuk menunjukkan besarnya kepercayaan. Teori ini berkembang bersamaan dengan pembuatan sistem pakar MYCIN. 
                Tim pengembang MYCIN mencatat bahwa dokter seringkali menganalisa informasi yang ada dengan ungkapan seperti misalnya : mungkin, kemungkinan besar, hampir pasti. Untuk mengakomodisi hal ini tim MYCIN menggunakan CF guna menggambarkan tingkat keyakinan pakar terhadap masalah yang sedang dihadapi.</p>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    --></body>
</html>
