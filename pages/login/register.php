
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="stylesheet" type="text/css" href="../../dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <!-- icon -->
 <link rel="icon" type="image/x-icon" href="../../assets/Images/r.png">
    <script src="../../assets/js/script.js"></script>
</head>
<body class="login">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #41a4bf;">
           <div class="featured-image mb-3">
            <img src="../../assets/Images/login-removebg-preview.png" class="img-fluid" style="width: 300px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Register Your Acount</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
       </div> 


       <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Hello, New User</h2>
                    <p>We are excited to welcome you.</p>
                </div>
                <form action="register_proses.php" method="post" onsubmit="return validateForm()">
                    <div class="input-group mb-3">
                        <input type="text" id="name" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="tel" id="phone_number" name="phone_number" class="form-control form-control-lg bg-light fs-6" placeholder="Nomor Handphone" required>
                    </div>
                    
                    <div class="input-group mb-1">
                        <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Agree to terms</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-info w-100 fs-6">Register</button>
                    </div>
                </form>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="../../assets/Images/google.png" style="width:20px" class="me-2"><small>Sign Up with Google</small></button>
                </div>
                <div class="row">
                    <small>Already have an account? <a href="../../index.php">Login</a></small>
                </div>
                <div id="error-message" class="alert alert-danger" style="display: none;"></div>
                <?php
                // Periksa apakah ada parameter error di URL 
                if (isset($_GET['error']) && $_GET['error'] === '1') {
                    echo "<script>showErrorMessage('Nomor hp sudah digunakan. Silakan gunakan nomor telepon lain atau coba lagi.');</script>";
                } 
                ?>
                <?php
                // Periksa apakah ada parameter error di URL 
                if (isset($_GET['error']) && $_GET['error'] === '2') {
                    echo "<script>showErrorMessage('Registrasi gagal, silahkan coba kembali');</script>";
                } 
                ?>
            </div>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
    <script src="../../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
