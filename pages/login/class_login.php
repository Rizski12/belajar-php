<?php
class Login
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->conn;
    }

    public function loginUser($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = MD5('$password')";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];
            return true; // Login berhasil
        } else {
            return false; // Login tidak valid
        }
    }
}
?>