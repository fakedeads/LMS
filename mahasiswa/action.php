<?php
session_start();
include ("../include/koneksi.php");
include 'koneksi/session.php';

//Pemanggilan PHPMailer
require_once('../PHPMailer/class.phpmailer.php');

$mail  = new PHPMailer();   
$mail->IsSMTP();

//GMAIL configerations
$mail->SMTPAuth   = true;                  
$mail->SMTPSecure = "ssl";                 
$mail->Host       = "smtp.gmail.com";      
$mail->Port       = 465;                   
$mail->Username   = "lms.stei.itb@gmail.com"; 
$mail->Password   = base64_decode("bG1zZHVsdWJybw==");         
//End Gmail

$action = $_GET['action'];
$action = str_replace('/','',str_replace('\\','',$action)); 

switch($action) {
	case "konfmhs" :
		// Update status Mahasiswa
		$nim = $_GET['nim'];
		$nim = str_replace('/','',str_replace('\\','',$nim)); 
		$hp = $_GET['hp'];
		$email = $_GET['email'];
		$nama_mhs = $_GET['nama_mhs'];
		$query  = "update tb_mahasiswa set status='aktif' WHERE nim='{$_GET['nim']}'";
		$result = mysql_query($query);
		
		//Pengiriman SMS konfirmasi pendaftaran kepada Mahasiswa
		$query1="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pendaftaran Anda sebagai Mahasiswa sudah dikonfirmasi, silahkan login menggunakan Username dan Password Anda | Admin LMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);
		
		//Pengiriman email konfirmasi pendaftaran kepada Mahasiswa
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama");
		$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("Pendaftaran Anda sebagai Mahasiswa sudah dikonfirmasi, <br/>
		silahkan login menggunakan Username dan Password Anda <br/>
		Link login LMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Terima Kasih </br>
		By : Admin LMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	
	case "change_password":
		$id = $_POST['id'];
		$change_password = $_POST['change_password'];
		$confirm_password = $_POST['confirm_password'];
		
		if($change_password != $confirm_password){
			echo"<script>
			alert('Password Anda tidak sama, $change_password = $confirm_password, silahkan ulang kembali');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}else{
			$password = md5($change_password);
			$query="UPDATE tb_user set password='$password' where id_pengenal='$id'";
			$result=mysql_query($query);
			echo"<script>
			alert('Password Anda berhasil diganti');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
	
	case "add_topik":
		$username = $_POST['username'];
		$topik = $_POST['topik'];
		$isi =  $_POST['isi'];
		
		$query ="select * from tb_topik";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		$cek = $row['topik'];
		
		if($topik == $cek){
			echo "<script>
					alert('Topik $topik yang Anda masukkan sudah ada');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			return;
		}
		
		if(!empty($topik) && !empty($isi))
	
		if(empty($_POST[topik]) || empty($_POST[isi])){
		 	echo "<script>
					alert('Data yang anda isikan tidak lengkap');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			return;
		}
		else
			{
				$query="INSERT INTO tb_topik (
					id, 
					username, 
					topik, 
					isi, 
					tanggal
					) 
					VALUES ( NULL, '$username', '$topik', '$isi', NOW())";
				$result = $mysqli->query($query);
				if($result == 1)					
					{
						echo "<script>
							alert('Topik : $topik berhasil dibuat');
						setTimeout(function() {
								document.location.href='forum.html';
						}, 1000);
						</script>";
					}
					else
					{
						echo "<script>
							alert('Topik Gagal dibuat');
						setTimeout(function() {
								document.location.href='forum.html';
						}, 1000);
						</script>";
					}
			}
	break;
			
	case "add_comment":
	
		$id_topik = $_POST['id'];
		$username = $_POST['username'];
		$isi = $_POST['isi'];
		
		if(!empty($isi))
		if(empty($_POST[isi])){
		echo "<script>
				alert('Data yang anda isikan tidak lengkap');
			setTimeout(function() {
					document.location.href='forum.html';
			}, 1000);
			</script>";
		return;
		}
		else{
			$query="INSERT INTO tb_reply (
				id,
				id_topik,  
				username, 
				isi,
				tanggal
				) 
				VALUES ( NULL, '$id_topik', '$username', '$isi', NOW())";
			//var_dump($query);
			$result = $mysqli->query($query);
			if($result == 1)					
			{
				echo "<script>
				alert('Komentar telah ditambahkan');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			}
			else
			{
				echo "<script>
					alert('Komentar gagal disimpan');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			}
			
			//Update data total balasan ketika komentar baru ditambahkan
			$query_balasan = mysql_query("SELECT id_topik FROM tb_reply WHERE id_topik='$id_topik'");
			$total_balas = mysql_num_rows($query_balasan);
			$total_balasan = $total_balas;
			//var_dump($query_balasan);
			
			$query2 = "UPDATE tb_topik SET total_balasan='$total_balasan' WHERE id='$id_topik'";
			$result = $mysqli->query($query2);
			//var_dump($query2);			
		}
	break;

/*Update rachmat tgl 16okt2015*/
	case "join_grup":

		  $nim =$_POST['nim'];
		  $kode_grup = $_POST['kode_grup'];

		  $query_mem_grup=mysql_query("INSERT INTO tb_grup_member (
		  		  id,
		          kode_grup,
		          status_member,  
		          level_member,
		          id_mhs_dsn
		          ) 
		          VALUES ( NULL, '$kode_grup', 'pending', 'member', '$nim')") or die(mysql_error());


		  if ($query_mem_grup) {
				header("location:grup.html");
			}
	break;
	case 'add_post_grup':
		$nim_mhs =$_POST['nim_mhs'];
		$kode_grup = $_POST['kode_grup'];

		$tulisan_upload = $_POST['info_tulisan'];
		$lokasi_file=$_FILES['file']['tmp_name'];
		$nama_file=$_FILES['file']['name'];

		move_uploaded_file($lokasi_file,"../file_grup/$nama_file");
		$tmpName  = $_FILES['file']['tmp_name'];// membaca nama file temporary
		$fileSize = $_FILES['file']['size'];// membaca size file
		$fileType = $_FILES['file']['type'];// membaca tipe file

		$query=mysql_query("INSERT INTO tb_mhs_mempunyai_grup (
		        id_akses,
		        tgl_akses,
		        unggah_tulisan,
		        unggah_file,
		        kode_grup,
		        id_mhs_dsn
		        ) 
		        VALUES 
		        ( NULL,
		         NOW(),
		         '$tulisan_upload',
		         '$nama_file',
		         '$kode_grup',
		         '$nim_mhs' )"
			) or die(mysql_error());

		
		if ($query) {
				header("location:grup_detail.html?v=$kode_grup");
			}

	break;
	case 'delete_post_grup':
		$id_mhs_dsn =$_POST['id_mhs_dsn'];
		$kode_grup = $_POST['kode_grup'];
		$id_akses = $_POST['id_akses'];
		
        	$query="DELETE from tb_mhs_mempunyai_grup where kode_grup='$kode_grup' and id_mhs_dsn='$id_mhs_dsn' and id_akses ='$id_akses'";
			$result=mysql_query($query);

			if ($query) {
					header("location:grup_detail.html?v=$kode_grup");
				}
       
		
	break;
/*/Update rachmat tgl 16okt2015*/

}	
?>