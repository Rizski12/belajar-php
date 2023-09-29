<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Produk</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Listing Produk</h2>
        <div class="produk-container">
            <?php
            include 'produk.php';

            foreach ($produk as $item) {
                echo '<div class="card">';
                echo '<img src="' . $item['gambar'] . '" alt="' . $item['nama'] . '">';
                echo '<h3>' . $item['nama'] . '</h3>';
                echo '<p>' . $item['deskripsi'] . '</p>';
                echo '<p>Harga: $' . $item['harga'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
