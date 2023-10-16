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
    $desc = $_POST["description"];
    $unit = $_POST["unit"];
    $discount = $_POST["discount_amount"];
    $stock = $_POST["stock"];
    $image = $_POST["image"];

    // Mengelola unggahan gambar
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Direktori penyimpanan gambar
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file; // Path gambar
        } else {
            echo "Gagal mengunggah gambar.";
        }
    }


    $sql = "INSERT INTO products (product_name, price, category_id, description, unit, discount_amount, stock, image) VALUES ('$product_name', '$price', '$category_id', '$desc', '$unit', '$discount', '$stock', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Query untuk mengambil data kategori produk
$sql_categories = "SELECT * FROM product_categories";
$categories_result = $conn->query($sql_categories);
?>

<?php include('../_partials/top.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
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
            <form action="tambah_produk.php" method="post">
                <h3>Data produk</h3>
                <table class="table table-striped table-middle">
                <tr>
                    <th width="20%">Nama Produk</th>
                    <td width="1%">:</td>
                    <td><input type="text" class="form-control" id="product_name" name="product_name" required></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" id="description" name="description" required></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>:</td>
                    <td><select class="form-control" id="category_id" name="category_id" required>
                    <?php
                        while($category = $categories_result->fetch_assoc()) {
                            echo "<option value='" . $category["id"] . "'>" . $category["category_name"] . "</option>";
                            }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" id="price" name="price" required></td>
                </tr>
                <tr>
                    <th>unit</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" id="unit" name="unit" required></td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" id="discount_amount" name="discount_amount" required></td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" id="stock" name="stock" required></td>
                </tr>

                
                </table>

                <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-danger" onclick="javascript:history.back();">
                <i class="fa fa-arrow-circle-left"></i> Batal
                </button>
            </form>
        </div>
      </div>
    </div>

<?php include('../_partials/bottom.php') ?>