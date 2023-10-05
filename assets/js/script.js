function showErrorMessage(message) {
    // Buat elemen div untuk menampilkan pesan kesalahan
    var errorDiv = document.createElement("div");
    errorDiv.className = "alert alert-danger";
    errorDiv.textContent = message;

    // Sisipkan elemen pesan kesalahan ke dalam form login
    var form = document.querySelector("form");
    form.appendChild(errorDiv);

    // Hapus pesan kesalahan setelah beberapa detik
    setTimeout(function () {
        form.removeChild(errorDiv);
    }, 3000);
}


function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "" || password === "") {
        // Tampilkan pesan kesalahan jika salah satu atau kedua field kosong
        var errorMessage = document.getElementById("error-message");
        errorMessage.textContent = "Harap isi semua form!";
        errorMessage.style.display = "block";

        // Hentikan pengiriman form
        // untuk menghilangkan pesan kesalahan setelah 3 detik
        setTimeout(function () {
            errorMessage.style.display = "none";
        }, 3000);

        // Hentikan pengiriman form
        return false;
    }

    return true; // Lanjutkan dengan pengiriman form jika semua field diisi
}







