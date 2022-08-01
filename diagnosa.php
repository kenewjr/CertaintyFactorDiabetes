<?php
// untuk memanggil file
include 'auth.php';
include 'crud.php';
// untuk mendeklarasikan class menjadi variabel
$crud = new Crud();
$auth = new auth();
$auth->koneksi();
$auth->notloggedin(); 
$arrayName = $crud->readGejala();
if (isset($_POST["logout"])) {
        $auth->logout ();
}
?>

<script type="text/javascript">
    function EnableDisableTextBox(gejala) {	
		
        var kondisi = document.getElementById("kondisi"+gejala);
		isCheckGejala = document.getElementById('gejala'+gejala).checked;
		

        if (isCheckGejala) {
			kondisi.disabled = gejala.checked ;
            kondisi.removeAttr();
			
        }else {
			kondisi.disabled = !gejala.checked ;
			kondisi.setAttribute("disabled");
			
		}
    }
</script>

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
                        <a class="nav-link  mx-4" href="index.php">Home</a>
                        <a class="nav-link active mx-4" href="diagnosa.php">Diagnosa</a>
                        <a class="nav-link mx-4" href="keterangan.php">Keterangan</a>
                        <a class="nav-link mx-4" href="tentang.php">Tentang</a>
                    </div>
                    <?php
                    $auth->isLoggedIn2();
                    ?>
                </div>
            </div>
        </nav>

        <div class="container my-2 mt-5">
		<div class="row">
			<div class="col-lg-12">
				<h3>Diagnosa Penyakit</h3>
    		<hr class="my-4">
			</div>
            <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
              <span class="fw-bold">Perhatian!</span><br>
        Silahkan memilih gejala sesuai dengan kondisi anda, anda dapat memilih kepastian kondisi dari pasti iya sampai pasti tidak, jika sudah tekan tombol <i>Proses</i> di bawah! untuk melihat hasil.
    </div>
            </div>
		</div>
	</div>


	<div class="container">
						<form name="form1" method="post" action="hasil.php"><br>
							<table align="center" class="table table-bordered table-striped table-hover">
								<th style="background-color:#95afc0;" class="text-white">NO</th>
								<th style="background-color:#95afc0;" class="text-white">GEJALA</th>
								<th style="background-color:#95afc0;" class="text-white" colspan ="2">KONDISI</th>
							
								<tr>
									<?php
									// untuk membuat array
									foreach ($arrayName as $r) {
									?>
								<tr>
									<td>
										<?php echo $r['id_gejala']; ?>
									</td>
									<td width="600">
										<?php echo $r['nama_gejala']; ?>
									</td>
									<td>
										
										<input id="gejala<?php echo $r['id_gejala'];?>" name="gejala[]" type="checkbox" value="<?php echo $r['id_gejala']; ?>" onclick="EnableDisableTextBox(<?php echo $r['id_gejala'];?>)"/>
										<br />
									
									</td>
									<td>
									<select id="kondisi<?php echo $r['id_gejala'];?>" name="kondisi[]" disabled="disabled">
									  
	                                   <option  value="1.0" >PASTI IYA (1)</option>
	                                   <option  value="0.8" >HAMPIR PASTI IYA (0.8)</option>
	                                   <option  value="0.6">KEMUNGKINAN BESAR IYA (0.6)</option>
	                                
                                        </select>
										<br />
									</td>
								<?php
									}
								?>
								<tr>
									<td colspan="4" align="center">
										<div class="d-grid gap-2 mt-2"><input type="submit"  name="button" value="PROSES" class="btn text-white fw-bold" style="background-color:#95afc0;">
										</div></td>
								</tr>
							</table>
							<br>
						</form>
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
