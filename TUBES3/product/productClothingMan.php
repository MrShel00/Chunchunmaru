<?php

  require_once('../Controller/db.php');

  if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
      $page = 1;
  }

  $num_per_page = 9;
  $start_from = ($page-1)*9;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Man Clothing</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"rel="stylesheet"/>
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <!--Main Navigation-->
<!-- Jumbotron -->
<div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-2">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="../index.php" class="float-start">
            <h4>Chuncunmaru</h4>
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8" >
        <form method="GET" action="productClothingMan.php">
            <div class="d-flex float-center">
            <div class="form-outline">
                <input type="search" name="keyword" id="form1" class="form-control"/>
                <label class="form-label" for="form1">Search</label>
              </div>
              <button type="submit" class="btn btn-primary shadow-0">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
        <!-- Center elements -->

        <!-- serch fitur -->
        <?php
          

        ?>


        <!-- serch fitur -->


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

<!-- sidebar + content -->
<section class="">
  <div class="container mt-4 ">
    <div class="row flex justify-content-center">
      
      <!-- content -->
      <div class="col-lg-9">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
          <div class="ms-auto">
          <?php
            if(isset($_GET['keyword'])){
              $keyword = $_GET['keyword'];
              $total_result = mysqli_query($con,"SELECT * FROM product WHERE jenis = 'T-Shirt' AND nama LIKE '%".$keyword."%' AND sex = 'M'");
              $row = mysqli_num_rows($total_result);
              echo "Total Item: " . $row;
              
            }else {
              $total_result = mysqli_query($con,"SELECT * FROM product WHERE jenis = 'T-Shirt' AND sex = 'M'");
              $row = mysqli_num_rows($total_result);
                echo "Total Item: " . $row;
            }
          ?>
        </header>

      
        <div class="row">
          
        <?php 
          if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $search_result = mysqli_query($con,"SELECT * FROM product WHERE jenis IN ('T-Shirt', 'Hoodie') AND nama LIKE '%".$keyword."%' AND sex = 'M' limit $start_from,$num_per_page");
          }else{
            $search_result = mysqli_query($con,"SELECT * FROM product WHERE jenis IN ('T-Shirt', 'Hoodie') AND sex = 'M' limit $start_from,$num_per_page");
          }

          if(mysqli_num_rows($search_result) > 0) {
            while($row=mysqli_fetch_array($search_result)){
        ?>
            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                <div class="card w-100 my-2 shadow-2-strong">
                    <img src="../admin/Product/upload/<?php echo $row['image_name']; ?>" class="card-img-top" width="500" height="400"/>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text"><?php echo $row['nama'] ?></p>
                        <div class="card-footer d-grid align-items-end pt-3 px-0 pb-0 mt-auto ">
                            <a href="/TUBES3/productDetail/productDetail.php?id_cakes=<?=$row['id']?>" class="btn btn-primary shadow-0 me-1">Detail</a>
                        </div>
                    </div>
                </div>
            </div>  
        <?php 
            }
          } else {
            echo '<p>No results found.</p>';
          }
        ?>


        </div>

        <hr />

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
        <?php 

        // if(isset($_GET['keyword'])){
        //   $keyword = $_GET['keyword'];
        //   $page_query = mysqli_query($con,"SELECT * FROM product WHERE jenis = 'T-Shirt' AND nama LIKE '%".$keyword."%' AND sex = 'M'");
        // }
        $total_record = mysqli_num_rows($total_result);
        $total_page = ceil($total_record/$num_per_page);
        
          if($page>1)
          {
              echo "<a href='productClothingMan.php?page=".($page-1)."'  class='btn btn-danger'>Previous</a>";
          }

          for($i=1;$i<$total_page;$i++)
          {
              echo "<a href='productClothingMan.php?page=".$i."' class='btn btn-primary'>$i</a>";
          }

          if($i>$page)
          {
              echo "<a href='productClothingMan.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
          }
        
          

        ?>
        </ul>
        
        <!-- Pagination -->
      </div>
    </div>
  </div>            
</section>
<!-- sidebar + content -->

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

