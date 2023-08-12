<!DOCTYPE html>
<html>
	<head>
		<title>Upload | Image</title>
	</head>
	<body>
		<?php 
		include '../../Controller/db.php';
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$img_name = $_FILES['file']['name'];

            $img_name = preg_replace("/[^a-zA-Z0-9.]/", "", $img_name);

			$x = explode('.', $img_name);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'upload/'.$img_name);
					$sql_img_upload = mysqli_query($con,"INSERT INTO product (image_name) VALUES ('$img_name')");
					if($sql_img_upload){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>
 
		<table>
			<?php 
			$data = mysqli_query($con, "select image_name from product ORDER BY id DESC LIMIT 1");
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<img src="<?php echo "upload/".$d['image_name']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table>
	</body>
</html>