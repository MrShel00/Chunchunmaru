<?php
// include database connection file
include_once("../../Controller/db.php");

$id = "";  
$kodeBarang = "";
$nama = "";
$jenis = "";
$warna = "";
$sex = "";
$brand = "";
$bahan = "";
$deskripsi = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET Method: Show the Data Of The Product
    if (!isset($_GET['id'])) {
        header('location: index.php');
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM product WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }

    $kodeBarang = $row['kodeBarang'];
    $nama = $row['nama'];
    $jenis = $row['jenis'];
    $warna = $row['warna'];
    $sex = $row['sex'];
    $brand = $row['brand'];
    $bahan = $row['bahan'];
    $deskripsi = $row['deskripsi'];

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST method: Update the data if client
    $id = $_POST['id'];  
    $kodeBarang = $_POST['kodeBarang'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $warna = $_POST['warna'];
    $sex = $_POST['sex'];
    $brand = $_POST['brand'];
    $bahan = $_POST['bahan'];
    $deskripsi = $_POST['deskripsi'];

    if (empty($kodeBarang) || empty($nama) || empty($jenis) || empty($warna) || empty($sex) || empty($brand) || empty($bahan) || empty($deskripsi)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE product " .
            "SET kodeBarang =  '$kodeBarang', nama='$nama',jenis='$jenis',warna='$warna', sex='$sex', brand='$brand', bahan='$bahan', deskripsi='$deskripsi' " . 
            "WHERE id = $id";

        $result = $con->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $con->error;
        } else {
            $successMessage = "Product updated successfully";
        }

        // Check if a file was uploaded
        if (!empty($_FILES['file']['name'])) {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $img_name = $_FILES['file']['name'];
            $x = explode('.', $img_name);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                    $upload_path = 'upload/' . $img_name;
                    if (move_uploaded_file($file_tmp, $upload_path)) {
                        // Update the image name in the database
                        $sql_img_update =  "UPDATE product " .
                        "SET kodeBarang =  '$kodeBarang', nama='$nama',jenis='$jenis',warna='$warna', sex='$sex', brand='$brand', bahan='$bahan', deskripsi='$deskripsi', image_name='$img_name' " . 
                        "WHERE id = $id";
                        $result_img_update = $con->query($sql_img_update);
                        if ($result_img_update) {
                            $successMessage .= ' and image updated';
                        } else {
                            $errorMessage .= ' but failed to update image in database';
                        }
                    } else {
                        $errorMessage .= ' and failed to upload file';
                    }
                } else {
                    $errorMessage .= ' and file size is too large';
                }
            } else {
                $errorMessage .= ' and uploaded file has unsupported extension';
            }
        }
    }
    header("Location: index.php?error_message=" . urlencode($errorMessage));
    exit;
}

?>


<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>
</head>
 
<body>
    
    <br/><br/>

        <div class="container my-5">
            <h2>Edit product</h2>

            <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
            ?>

            <form method="post" action="edit.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="row mb-3" >  
                        <label class="col-sm-3 col-form-label">Kode Barang</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="kodeBarang" value="<?php echo $kodeBarang;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">jenis</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="jenis" value="<?php echo $jenis;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">warna</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="warna" value="<?php echo $warna;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">sex</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="sex" value="<?php echo $sex;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">brand</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="brand" value="<?php echo $brand;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">bahan</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="bahan" value="<?php echo $bahan;?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">deskripsi</label>
                        <div col-sm-6>
                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi;?>" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">IMAGE</label>
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>

                    <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                    </div>
                    ";
                }
                ?>

                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-danger" href="index.php" role="button">Cancel</a>
                        </div>
                    </div>

                </form>
                
                
        </div>

        
</body>
</html>