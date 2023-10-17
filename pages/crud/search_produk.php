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

    // Query untuk mengambil data produk
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $sql = "SELECT products.*, category_name FROM products
        JOIN product_categories ON products.category_id = product_categories.id";
    $result = mysqli_query($conn, $sql);

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
  <title>Hasil Pencarian Produk</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="../../dist/fontawesome-free/css/all.min.css">
 <!-- Bootstrap-->
 <link rel="stylesheet" href="../../dist/bootstrap/css/bootstrap.min.css">
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

  <?php include('../_partials/sidebar.php') ?>

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

    <!-- Awal tabel produk -->
    <div class="container mt-1">
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
            <table class="table table-bordered border-3 table-hover">
                <thead class="table-primary text-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Unit</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../config/koneksi.php';
                    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search_query"])) {
                        $search_query = $_POST["search_query"];

                        //  Query pencarian ke database
                        $query ="SELECT products.*, product_categories.category_name
                        FROM products
                        LEFT JOIN product_categories ON products.category_id = product_categories.id
                        WHERE products.product_name LIKE '%$search_query%' OR 
                              product_categories.category_name LIKE '%$search_query%' OR 
                              products.description LIKE '%$search_query%'";

                        // Eksekusi Query dan tampilkan hasilnya
                        $result = mysqli_query($conn, $query);
                        $count = 1;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='text-center'>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row["product_name"] . "</td>";
                                echo "<td>" . $row["category_name"] . "</td>";
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
                            echo "<tr><td colspan='9' class='text-center'>Tidak ada hasil pencarian.</td></tr>";
                        }
                    }
                    ?>
                </tbody>
               </table>
             </div>
           </div>
        </div>

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
                    <div class="row mt-3">
                        <?php
                         if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search_query"])) {
                            $search_query = $_POST["search_query"];
    
                            //  Query pencarian ke database
                            $query ="SELECT products.*, product_categories.category_name
                            FROM products
                            LEFT JOIN product_categories ON products.category_id = product_categories.id
                            WHERE products.product_name LIKE '%$search_query%' OR 
                                  product_categories.category_name LIKE '%$search_query%' OR 
                                  products.description LIKE '%$search_query%'";
    
                        // Eksekusi Query dan tampilkan hasilnya
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo "Error: " . mysqli_error($conn);
                        }
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-4">
                          <div class="card-produk mb-3"  style="width: 17rem;">
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
                        </div>
                        <?php
                            }
                        } else {
                            echo "<div colspan='9' class='text-center'>Tidak ada hasil pencarian.</div>";
                        }
                    }
                    ?>
                </div>
                <!-- Akhir  card produk -->
            </div>
        </div>
    </section>
     <!--Akhir Body Card produk-->

    <br>
    <?php include('../_partials/bottom.php') ?>

