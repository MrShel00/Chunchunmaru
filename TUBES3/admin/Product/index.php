<?php
// Create database connection using config file
include_once("../../Controller/db.php");

session_start();

if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
      $page = 1;
  }

  $num_per_page = 10;
  $start_from = ($page-1)*10;

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: ../login/login.php');
    exit();
}
 
// Fetch all product data from database

?>
 
<html>
<head>    
    <title>Product</title>
</head>
 
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>CRUD</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"rel="stylesheet"/>
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    
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
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-center">
          <div class="form-outline">
            <form action="index.php" method="GET" class="d-flex">
                <input type="search" name="keyword" id="form1" class="form-control" />
                <label class="form-label" for="form1">Search</label>
              </div>
              <button type="submit" class="btn btn-primary shadow-0 mr-5">
                <i class="fas fa-search "></i>
              </button>
            </form>
              <div class='ml-5'>
                <a class='btn btn-danger shadow-0 ml-5' style="float:right" href="../Login/logout.php">Logout</a>
              </div>
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
            <a class="nav-link text-dark" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php">Products</a>
          </li>
          
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <div class="container my-5">
    <h2>List of Product</h2>
      <div class="ms-auto">
            <?php
              $total_query = "select count(*) as total from product";
              $total_result = mysqli_query($con,$total_query);

              if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
                $total_result = mysqli_query($con,"SELECT * FROM product WHERE nama  LIKE '%".$keyword."%'");
                $row = mysqli_num_rows($total_result);
                echo "Total Item: " . $row;
                
              }else {
                $total_result = mysqli_query($con,"SELECT * FROM product ");
                $row = mysqli_num_rows($total_result);
                  echo "Total Item: " . $row;
              }
            ?>
        </div>
    <a type="button" class="btn btn-primary " style="float:right" href="add.php">Add Product</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>kodeBarang</th>
                <th>Product Name</th>
                <th>Jenis</th>
                <th>warna</th>
                <th>Gender</th>
                <th>Brand</th>
                <th>Bahan</th>
                <th>Deskripsi</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php     
          if(isset($_GET['keyword'])){
              $keyword = $_GET['keyword'];
              $search_query = "SELECT * FROM product WHERE nama LIKE '%$keyword%' LIMIT $start_from, $num_per_page";
          } else {
              $search_query = "SELECT * FROM product LIMIT $start_from, $num_per_page";
          }

          $search_result = mysqli_query($con, $search_query);

          // read data
          if (mysqli_num_rows($search_result) > 0) {
              while($row = mysqli_fetch_assoc($search_result)){
                  echo "
                  <tr>
                      <td>{$row['id']}</td>
                      <td>{$row['kodeBarang']}</td>
                      <td>{$row['nama']}</td>
                      <td>{$row['jenis']}</td>
                      <td>{$row['warna']}</td>
                      <td>{$row['sex']}</td>
                      <td>{$row['brand']}</td>
                      <td>{$row['bahan']}</td>
                      <td>{$row['deskripsi']}</td>
                      <td><img src='upload/{$row['image_name']}' style='max-width: 50px; height: auto;' /></td>
                    <td>
                        <a class='btn btn-primary btn-border-width: 10px btn-font-size:14.4px' href='edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-border-width: 10px'  href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>";
              }
          } else {
              echo '<tr><td colspan="11">No results found.</td></tr>';
          }
          ?>

        </tbody>

    </table>
    
    <hr />

<!-- Pagination -->
<ul class="pagination justify-content-center">
<?php 
$total_record = mysqli_num_rows($total_result);
$total_page = ceil($total_record/$num_per_page);

  if($page>1)
  {
      echo "<a href='index.php?page=".($page-1)."'  class='btn btn-danger'>Previous</a>";
  }

  for($i=1;$i<$total_page;$i++)
  {
      echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";
  }

  if($page < $total_page)
  {
      echo "<a href='index.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
  }

  

?>
</ul>

<!-- Pagination -->
</div>

  


    <!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" >
  <!-- Section: Links  -->
  <section class=" " style="background-color: #f5f5f5;">
    <div class="container text-center text-md-start pt-4 pb-4" >
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