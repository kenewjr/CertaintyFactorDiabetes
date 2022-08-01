<?php
  session_start();
  /**
   * Crud class
   * turunan dario class koneksi
   */


  class auth /*extends koneksi*/
  {
    // untuk mengambil function dari parent(koneksi)
    function koneksi (){
			 $host = 'localhost';
			 $name = 'root';
			 $pass = '';
			 $dbname = 'diagnosa';
			
			 $konek= mysqli_connect($host,$name,$pass,$dbname); 
		if (mysqli_connect_errno()) {
			echo "DATABASE TIDAK ADA !  ".mysqli_connect_error();
		}else {
			$this->konek=$konek;
			return $this->konek;
		}
	}

    function login ($username,$pass){
        $exec=mysqli_query($this->konek,"SELECT * FROM user WHERE username='$username' OR email='$username' OR no_hp='$username'");
        if (mysqli_num_rows($exec)>0) {
            $row=mysqli_fetch_assoc($exec);
            if(password_verify($pass, $row["password"])){
              $nama = $row["nama"];
					    $status = $row["status"];
              if ($status==="admin") {
              $_SESSION["nama"] = $nama;
              $_SESSION["login"] = true;
              header("Location:admin.php");
              exit();
              return true;
					    }else if($status==="user") {
              $_SESSION["nama"] = $nama;
              $_SESSION["login"] = true;
              header("Location:diagnosa.php");
              exit();
						  return true;
              }
            }else {
                echo "<script>
                alert ('Username atau Password anda salah');
                </script>";
                return false;
            }
        }
    }
    function isLoggedIn(){
      if (isset($_SESSION['login'])) {
        header("Location:index.php");
        exit();
        return true;
      }
    }
    function isLoggedIn2(){
      if (isset($_SESSION['login'])) {
        
        echo "<div class='dropdown'>
  <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
   ".$_SESSION['nama']."
  </button>
  <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
    <form action='' method='post'>
    <li><button class='dropdown-item' name='logout' >Logout</button></li>
    </form>
  </ul>
</div>";
      }else {
        echo"
        <div class='navbar-nav m-auto'>
                        <a class='nav-link mx-4' href='Login.php'>Login</a>
                    </div>";
      }
    }
    function logout(){
    unset($_SESSION["nama"]);
		unset($_SESSION["login"]);
		session_destroy();
		header("Location:login.php");
		exit();
    }
    function notloggedin(){
		if (!isset($_SESSION["login"])) {
			header("Location:login.php");
		exit();
		}else {
			$_SESSION["nama"];
		}
	  }
    function tambah($data,$tabel){
        $field = '';
		$value = '';
		foreach ($data as $i => $v) {
			$field .=$i.',';
			$value .= "'".$v."',";
		}
		$field=substr($field, 0,-1);
		$value=substr($value, 0,-1);
		$q="INSERT INTO ".$tabel."(".$field.")values(".$value.")";
		$exec=mysqli_query($this->konek,$q);
		if (mysqli_affected_rows($this->konek)) {
			echo "<script> 
				alert('Berhasil Dibuat');
				</script>";
        header("Location:admin.php");
			return 1;
		}else{
			echo "<script> 
				alert('Gagal Dibuat');
				</script>";
			return 0;
		}
    }
    // function cekkodegejala($namagejala,$data,$tabel){
	// 	$q="SELECT id_gejala FROM gejala WHERE nama_gejala='$namagejala'";
	// 	$exec=mysqli_query($this->konek,$q);
    // $row=mysqli_fetch_assoc($exec);
	// 	$idgejala = $row["id_gejala"];
    //   $data2 = array(
    //     'id_gejala'=>$idgejala
    //     );
    //     array_push($data, $data2); 
    //     $this->tambah($data, $tabel);
	//   }
	function update($data,$tabel,$where,$id){
		$data2 = '';
		foreach ($data as $i => $v) {
			$data2 .=$i.'='."'".$v."',";
		}
		$data2=substr($data2, 0,-1);
		$q="UPDATE $tabel SET $data2 WHERE $where='$id'";
		$exec=mysqli_query($this->konek,$q);
		if (mysqli_affected_rows($this->konek)) {
			echo "<script> 
				alert('Data Berhasil Di Edit!! ');
				</script>";
			return 1;
		}else{
			return 0;
		}
	}
	function jumlah($table)
	{
	$sql    ="SELECT * FROM $table";
	$query    =mysqli_query($this->konek,$sql);
	$data    =array();
	while(($row    =mysqli_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo $count;
	}
	function hapus($table,$where,$id){
		$q = "DELETE FROM $table WHERE $where = '$id' ";
		$exec = mysqli_query($this->konek,$q);
		if (mysqli_affected_rows($this->konek)){
			echo "<script> 
				alert('Data Berhasil Di Hapus');
				</script>";
		}
	}
	function selectwhere($table,$status,$field){
		$q = "SELECT * FROM $table WHERE $field = '$status'";
		$exec = mysqli_query($this->konek,$q);
		while ($row = mysqli_fetch_array($exec)){
			$data[] = $row;
		}			
		return $data;
	}
		function select($table){
			$q = "SELECT * FROM ".$table;
			$exec=mysqli_query($this->konek,$q);
			while ($row = mysqli_fetch_array($exec)){
				$data[] = $row;
			}			
			return $data;
		}
    function cekakun($username,$email,$nohp,$data,$tabel){
		$q="SELECT username,email,no_hp FROM $tabel WHERE username='$username' OR email='$email' OR no_hp='$nohp'";
		$exec=mysqli_query($this->konek,$q);
		if (mysqli_num_rows($exec)) {
			echo "<script> 
				alert('Akun Sudah Terdaftar');
				</script>";
			return 1;
		}else {
			$this->tambah($data, $tabel);
			return 0;
		}
	  }
	function cekpengetahuan($kode,$idgejala,$data,$tabel){
		$q ="SELECT kode_penyakit,id_gejala FROM $tabel WHERE kode_penyakit = '$kode' AND id_gejala = '$idgejala'";
		$exec=mysqli_query($this->konek,$q);
		if (mysqli_num_rows($exec)) {
			echo "<script> 
				alert('Data Sudah Tersedia');
				</script>";
			return 1;
		}else {
			$this->tambah($data, $tabel);
			echo "<script> 
				alert('Data Berhasil Di Tambahkan');
				</script>";
			return 0;
		}
	}
    function notcrossuser(){
		$nama = $_SESSION["nama"];
			$exec=mysqli_query($this->konek,"SELECT status FROM user WHERE nama='$nama'");
			$row=mysqli_fetch_assoc($exec);
				$status = $row["status"];
					if ($status=="user") {
						header("Location:diagnosa.php");
						exit();
						return true;
					}			
	}
	function notcrossadmin(){
		$nama = $_SESSION["nama"];
			$exec=mysqli_query($this->konek,"SELECT status FROM user WHERE nama='$nama'");
			$row=mysqli_fetch_assoc($exec);
				$status = $row["status"];
					if ($status==="admin") {
						header("Location:admin.php");
						exit();
						return true;
					}	
	}
  }


 ?>
