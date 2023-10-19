<?php
session_start();


// Periksa apakah pengguna sudah masuk. Jika tidak, arahkan ke halaman login.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}
// Ambil nama pengguna dari database berdasarkan ID yang disimpan dalam sesi
$user_id = $_SESSION['user_id'];
require('../../config/koneksi.php');
$query = "SELECT name FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['name'];
} else {
    // Handle error jika data pengguna tidak ditemukan
    echo "User data not found.";
    exit;
}
?>
<?php
include '../../config/koneksi.php';

// hitung data produk
$query_jumlah_products = "SELECT COUNT(*) AS total FROM products";
$hasil_jumlah_products = mysqli_query($conn, $query_jumlah_products);
$jumlah_products = mysqli_fetch_assoc($hasil_jumlah_products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard| CRUD Product</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="../../dist/fontawesome-free/css/all.min.css">
 <!-- Bootstrap-->
 <link rel="stylesheet" href="../../../dist/bootstrap/css/bootstrap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
 <!-- Style css-->
 <link rel="stylesheet" href="../../assets/css/admin.css">
<link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../assets/Images/arkatama.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../assets/Images/arkatama.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../assets/Images/rizki.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">5 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.html" class="brand-link">
      <img src="../../assets/Images/download.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rizski Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/Images/rizki.jpg" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user_name; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../dashboard/dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../array-dash.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Array-Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../listing-produk.php" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                List-Products
              </p>
            </a>
          </li>
          <li class="nav-item bg-secondary">
            <a href="../crud/index.php" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                CRUD-Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Login
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../login/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                LogOut
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CRUD Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="container-fluid">
    <?php
      if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success m-3">' . $_SESSION['success_message'] . ' </div>';
        unset($_SESSION['success_message']);
      }
    
      if (isset($_SESSION['success_message1'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success_message1'] . '</div>';
        // Hapus pesan sukses setelah 3 detik
        echo '<script>setTimeout(function() { $(".alert").remove(); }, 3000);</script>';
        // Hapus pesan sukses dari sesi
        unset($_SESSION['success_message1']);
      }
    
     if (isset($_SESSION['success_message2'])) {
      echo '<div class="alert alert-success">' . $_SESSION['success_message2'] . '</div>';
      // Hapus pesan sukses setelah 3 detik
      echo '<script>setTimeout(function() { $(".alert").remove(); }, 3000);</script>';
      // Hapus pesan sukses dari sesi
      unset($_SESSION['success_message2']);
    }
    ?>
    <script>
      // Menghilangkan pesan alert setelah 3 detik
      setTimeout(function() {
        var alert = document.querySelector(".alert");
        if (alert) {
          alert.style.display = "none";
        }
      }, 3000);
    </script>
    </div>
  
    <!-- Awal tabel produk -->
    <section class="container-fluid mt-1">
    <div class="card">
      <div class="card-header row">
          <div class="col-md-6">
            <h4 class="title">DataTable Products</h4>
          </div>
          <div class="col-md-6 text-right">
            <a href="tambah_produk.php" class="btn btn-primary"><i class="fas fa-plus"></i><strong> Add Produk</strong></a>
          </div>
      </div>
      <div class="card-body">
      <table class="table table-bordered border-3">
        <thead class="table-primary text-dark">
          <tr class="text-center">
              <th>No</th>
              <th>Gambar</th>
              <th>Produk</th>
              <th>Kategori</th>
              <th>kode</th>
              <th>Deskripsi</th>
              <th>Unit</th>
              <th>Discount</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $results_per_page = 5;
          $query = "SELECT * FROM products";
          $result = mysqli_query($conn, $query);
          $total_products = mysqli_num_rows($result);
          $total_pages = ceil($total_products / $results_per_page);

          if (!isset($_GET['page'])) {
              $page = 1;
          } else {
              $page = $_GET['page'];
          }

          $start_index = ($page - 1) * $results_per_page;
          $query = "SELECT products.*, product_categories.category_name
                    FROM products
                    LEFT JOIN product_categories ON products.category_id = product_categories.id
                    LIMIT $start_index, $results_per_page";
          $result = mysqli_query($conn, $query);

          $count = 1;
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr class='text-center'>";
                  echo "<td>" . $count . "</td>"; 
                  echo "<td><img src='" . $row["images"] . "' alt='gambar produk' width='80' height='80'></td>";
                  echo "<td>" . $row["product_name"] . "</td>";
                  echo "<td>" . $row["category_name"] . "</td>";
                  echo "<td>" . $row["product_code"] . "</td>";
                  echo "<td>" . $row["description"] . "</td>";
                  echo "<td>" . $row["unit"] . "</td>";
                  $discount_percent = $row['discount_amount'] . "%";
                  echo "<td>" . $discount_percent . "</td>";
                  echo "<td>" . $row["stock"] . "</td>";
                  $formatted_price = "Rp. " . number_format($row["price"], 0, ',', '.');
                  echo "<td>" . $formatted_price . "</td>";
                  echo "<td> <a class='btn btn-sm btn-warning' href='edit_produk.php?id=" . $row["id"] ."'><i class='fas fa-edit'></i> Edit</a>
                  | <a href='hapus_produk.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i> Hapus</a></td>";
                  echo "</tr>"; 
                  $count++; 
              }
          } else {
              echo "Tidak ada data produk.";
          }
          ?>
        </tbody>
      </table>
      <!-- menampilkan produk -->
      <div class="row mt-2">
                  <div class="col-md-6">
                      <h5>Menampilkan produk <?php echo $start_index + 1; ?> - <?php echo min($start_index + $results_per_page, $total_products); ?> dari <?php echo $total_products; ?> produk.</h5>
                  </div>
                  <div class="col-md-6">
                      <!-- Pagination -->
                      <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-end">
                              <?php
                              $prev_page = $page - 1;
                              $next_page = $page + 1;

                              if ($page > 1) {
                                  echo "<li class='page-item'><a class='page-link' href='index.php?page=$prev_page'>&laquo; Previous</a></li>";
                              }

                              for ($i = 1; $i <= $total_pages; $i++) {
                                  $active = ($i == $page) ? 'active' : '';
                                  echo "<li class='page-item $active'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                              }

                              if ($page < $total_pages) {
                                  echo "<li class='page-item'><a class='page-link' href='index.php?page=$next_page'>Next &raquo;</a></li>";
                              }
                              ?>
                          </ul>
                      </nav>
                      <!-- Pagination -->
                  </div>
              </div>
            <!-- menampilkan produk -->
    </div>
  </div>

      <div class="card bg-light mb-2 mt-3">
          <div class="card-body">
              <h5 class="card-title">Total Produk</h5>
              <p class="card-text">Jumlah total produk: <span id="total-products"><?php echo $jumlah_products['total'] ?></span></p>
          </div>
      </div>
      <br>
  </section>
  <!--Akhir tabel produk-->

  <!--Awal Body Card produk-->
  <section class="container-fluid mt-1">
    <div class="card">
        <div class="card-header row">
            <div class="col-md-6">
                <h4 class="title">Data Produk</h4>
            </div>
            <div class="col-md-6 text-right">
                <h4>Card Produk</h4>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="search_produk.php" class="mt-1">
                <div class="input-group mb-3">
                    <input type="text" name="search_query" class="form-control" placeholder="Cari produk berdasarkan nama, kategori, atau deskripsi" value="<?php echo isset($_POST['search_query']) ? $_POST['search_query'] : ''; ?>">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
            <!-- Awal card produk -->
            <div class="produk-container mt-2">
                <?php
                $results_per_page_card = 6;
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                $total_products = mysqli_num_rows($result);
                $total_pages = ceil($total_products / $results_per_page_card);
      
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
      
                $start_index = ($page - 1) * $results_per_page_card;
                $query = "SELECT products.*, product_categories.category_name
                          FROM products
                          LEFT JOIN product_categories ON products.category_id = product_categories.id
                          LIMIT $start_index, $results_per_page_card";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                }
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                    <div class="card-produk mb-3 ml-4"  style="width: 17rem;">
                    <span class="badge-produk"><?php echo $row['discount_amount']; ?> %</span>
                    <img src="<?php echo $row['images']; ?>" class="card-img-top" alt="Gambar Produk">
                        <div class="card-body p-2">
                            <h4 class="card-title"><?php echo $row['product_name']; ?></h4>
                            <br>
                            <p class="deskripsi"><?php echo $row['description']; ?></p>
                            <p class="kategori">Kategori: <?php echo $row['category_name']; ?></p>
                            <p class="harga">Harga: Rp. <?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                            <p class="stok">Stok: <?php echo $row['stock']; ?></p>
                            <button class="order-button me-md-2">Order</button>
                            <button class="cart-button"><i class="fas fa-shopping-cart"></i></button>
                          </div>
                    </div>
                <?php
                    }
                } else {
                    echo "Tidak ada data produk.";
                }
                ?>
          </div>
        <!-- Akhir  card produk -->

          <!-- menampilkan produk -->
          <div class="row mt-2">
                  <div class="col-md-6">
                      <h5>Menampilkan produk <?php echo $start_index + 1; ?> - <?php echo min($start_index + $results_per_page_card, $total_products); ?> dari <?php echo $total_products; ?> produk.</h5>
                  </div>
                  <div class="col-md-6">
                      <!-- Pagination -->
                      <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-end">
                              <?php
                              $prev_page = $page - 1;
                              $next_page = $page + 1;

                              if ($page > 1) {
                                  echo "<li class='page-item'><a class='page-link' href='index.php?page=$prev_page'>&laquo; Previous</a></li>";
                              }

                              for ($i = 1; $i <= $total_pages; $i++) {
                                  $active = ($i == $page) ? 'active' : '';
                                  echo "<li class='page-item $active'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                              }

                              if ($page < $total_pages) {
                                  echo "<li class='page-item'><a class='page-link' href='index.php?page=$next_page'>Next &raquo;</a></li>";
                              }
                              ?>
                          </ul>
                      </nav>
                      <!-- Pagination -->
                  </div>
              </div>
            <!-- menampilkan produk -->
        </div>
    </div>
</section>
  <!--Akhir Body Card produk-->


<br>
<br>
  <footer class="user-footer position-absolute mt-3 bottom-0">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../../dist/jquery/jquery.min.js"></script>
<!-- Bootstrap 5 -->
<script src="../../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

