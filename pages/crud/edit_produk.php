<?php
session_start();

// Periksa apakah pengguna sudah masuk. Jika tidak, arahkan ke halaman login.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

?>
<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $category_id = $_POST["category_id"];
    $id = $_POST["id"];
    $desc = $_POST["description"];
    $unit = $_POST["unit"];
    $discount = $_POST["discount_amount"];
    $stock = $_POST["stock"];

    $sql = "UPDATE products SET product_name='$product_name', price='$price', category_id='$category_id', description='$desc', unit='$unit', discount_amount='$discount', stock='$stock'  WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id = $_GET["id"];
$sql = "SELECT products.*, product_categories.category_name
        FROM products
        JOIN product_categories ON products.category_id = product_categories.id
        WHERE products.id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// Query untuk mengambil data kategori produk
$sql_categories = "SELECT * FROM product_categories";
$categories_result = $conn->query($sql_categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Produk</title>

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
            <h1>Edit Product</h1>
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

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="edit_produk.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                  <h3>A. Data Produk</h3>
                  <table class="table table-striped table-middle">
                  <tr>
                      <th width="20%">product_name</th>
                      <td width="1%">:</td>
                      <td><input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row["product_name"]; ?>" required></td>
                  </tr>
                  <tr>
                      <th>Kategori</th>
                      <td>:</td>
                      <td><select class="form-select" id="category_id" name="category_id" required>
                                  <?php
                                  while($category = $categories_result->fetch_assoc()) {
                                      $selected = ($category["id"] == $row["category_id"]) ? "selected" : "";
                                      echo "<option value='" . $category["id"] . "' $selected>" . $category["category_name"] . "</option>";
                                  }
                                  ?>
                              </select>
                      </td>
                  </tr>
                  <tr>
                      <th>description</th>
                      <td>:</td>
                      <td><textarea class="form-control" id="description" name="description"><?php echo $row["description"]; ?></textarea></td>
                  </tr>
                  <tr>
                      <th>harga</th>
                      <td>:</td>
                      <td><input type="text" class="form-control" id="price" name="price" value="<?php echo $row["price"]; ?>" required></td>
                  </tr>
                  <tr>
                      <th>unit</th>
                      <td>:</td>
                      <td><input type="text" class="form-control" id="unit" name="unit" value="<?php echo $row["unit"]; ?>" required></td>
                  </tr>
                  <tr>
                      <th>discount_amount</th>
                      <td>:</td>
                      <td><input type="text" class="form-control" id="discount_amount" name="discount_amount" value="<?php echo $row["discount_amount"]; ?>" required></td>
                  </tr>
                  <tr>
                      <th>stock</th>
                      <td>:</td>
                      <td><input type="text" class="form-control" id="stock" name="stock" value="<?php echo $row["stock"]; ?>" required></td>
                  </tr>
                  </table>



                  <button type="submit" class="btn btn-success">
                  <i class="fa fa-save"></i> Simpan
                  </button>
                  <button type="button" class="btn btn-danger" onclick="javascript:history.back()">
                  <i class="fa fa-arrow-circle-left"></i> Batal
                  </button>
              </form>
          </div>
      </div>
   </div>

    <?php include('../_partials/bottom.php') ?>
