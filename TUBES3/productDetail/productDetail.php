<?php
// Include the database configuration file 
include_once '../Controller/db.php'; 

// Get the id_cakes parameter from the URL
if (isset($_GET['id_cakes'])) {
    $id = $_GET['id_cakes'];

    // Fetch product details from the database based on the provided id
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        // Handle case where no product is found
        echo "Product is not available.";
    }
} else {
    // Handle case where id_cakes parameter is missing
    echo "There is an error data.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Product Detail</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"rel="stylesheet"/>
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <!-- Jumbotron -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-2">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="/index.php" class="float-start">
            <h4>Chuncunmaru</h4>
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-center">
          <div class="form-outline">
              <input type="search" id="form1" class="form-control" />
              <label class="form-label" for="form1">Search</label>
            </div>
            <button type="button" class="btn btn-primary shadow-0">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <!-- Center elements -->

        <!-- Right elements -->
        <div class="col-lg-5 col-md-12 col-12 ">
        </div>
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container justify-content-center justify-content-md-between">
      <!-- Toggle button -->
      <button
              class="navbar-toggler border py-2 text-dark"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarLeftAlignExample"
              aria-controls="navbarLeftAlignExample"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="/TUBES3">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/TUBES3/productview/productview.php">Products</a>
          </li>
          <!-- Navbar dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              Man
            </a>
            <!-- Dropdown menu -->
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/TUBES3/product/productClothingMan.php">clothing</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="/TUBES3/product/productShoesMan.php">Shoes</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Woman
            </a>
            <!-- Dropdown menu -->
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/TUBES3/product/productClothingWoman.php">clothing</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="/TUBES3/product/productShoesWoman.php">Shoes</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="../admin/Product/upload/<?php echo $product['image_name']; ?>" alt="<?php echo $product['nama']; ?> " width="600" height="550"/>
                </div>
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        <?php echo $product['nama']; ?>
                    </h4>
                    <p>Detail : </p>
                    <p><?php echo $product['deskripsi']; ?></p>

                    <div class="row mt-4">
                        <dt class="col-3">Type:</dt>
                        <dd class="col-9"><?php echo $product['jenis']; ?></dd>

                        <dt class="col-3">Color</dt>
                        <dd class="col-9"><?php echo $product['warna']; ?></dd>

                        <dt class="col-3">Material</dt>
                        <dd class="col-9"><?php echo $product['bahan']; ?></dd>

                        <dt class="col-3">Brand</dt>
                        <dd class="col-9"><?php echo $product['brand']; ?></dd>
                    </div>

                    <!-- Rest of your code -->
                </div>
            </main>
        </div>
    </div>
</section>
<!-- content -->



<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
          <a href="#" class="">
            <h4>Chuncunmaru</h4>
          </a>
          <p class="mt-2 text-dark">
            © 2023 Copyright: Chuncunmaru.com
          </p>
        </div>
        <!-- Grid column -->
        
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php



?>