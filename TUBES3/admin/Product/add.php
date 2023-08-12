<?php
include_once("../../Controller/db.php");


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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kodeBarang = $_POST["kodeBarang"];
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $warna = $_POST["warna"];
    $sex = $_POST["sex"];
    $brand = $_POST["brand"];
    $bahan = $_POST["bahan"];
    $deskripsi = $_POST["deskripsi"];

    if (empty($kodeBarang) || empty($nama) || empty($jenis) || empty($warna) || empty($sex) || empty($brand) || empty($bahan) || empty($deskripsi)) {
        $errorMessage = "All the fields are required";
    } else {
        
        // Upload IMG
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
                        // Insert product info along with the image name
                        $sql = "INSERT INTO product (kodeBarang, nama, jenis, warna, sex, brand, bahan, deskripsi, image_name)" . 
                                "VALUES ('$kodeBarang', '$nama', '$jenis', '$warna', '$sex', '$brand', '$bahan', '$deskripsi', '$img_name')";
                        $result = $con->query($sql);
    
                        if ($result) {
                            $successMessage = "Product added correctly";
                            
                            // Redirect to index.php after successful upload
                            header("Location: index.php");
                            exit;
                        } else {
                            $errorMessage = "Invalid query: " . $con->error;
                        }
                    } else {
                        $errorMessage = 'GAGAL UPLOAD FILE';
                    }
                } else {
                    $errorMessage = 'UKURAN FILE TERLALU BESAR';
                }
            } else {
                $errorMessage = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
        } else {
            $errorMessage = "Image is required";
        }
    }
    
    // If there is an error or if the upload process is not successful, stay on the same page
    header("Location: index.php?error_message=" . urlencode($errorMessage));
    exit;
}    

    // ... (previous input data retrieval remains unchanged)
?>

<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>
</head>
 
<body>

        <div class="container my-5">
            <h2>New product</h2>
            

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

            <form method="post" enctype="multipart/form-data">
            <div class="row mb-3" >  
                    <label class="col-sm-3 col-form-label">Kode Barang</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="kodeBarang" value="<?php echo $kodeBarang?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">jenis</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="jenis" value="<?php echo $jenis?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">warna</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="warna" value="<?php echo $warna?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">sex</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="sex" value="<?php echo $sex?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">brand</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="brand" value="<?php echo $brand?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">bahan</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="bahan" value="<?php echo $bahan?>" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">deskripsi</label>
                    <div col-sm-6>
                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi?>" >
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
                        <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-danger" href="index.php" role="button">Cancel</a>
                    </div>
                </div>

            </form>
                
                
        </div>

        
</body>
</html>