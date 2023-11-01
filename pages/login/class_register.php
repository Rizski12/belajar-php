<?php
class Register
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->conn;
    }

    public function registerUser($name, $email, $phone_number, $password)
    {
        // Ganti username dengan phone_number
        $username = $phone_number;

        $checkUsernameQuery = "SELECT id FROM users WHERE username = '$username'";
        $checkUsernameResult = mysqli_query($this->conn, $checkUsernameQuery);
        if (mysqli_num_rows($checkUsernameResult) > 0) {
            return false; // Username sudah digunakan
        }

        $query = "INSERT INTO users (name, email, phone_number, username, password, group_id) VALUES ('$name', '$email', '$phone_number', '$username', MD5('$password'), 3)";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function isPhoneNumberUsed($phone_number)
    {
        $query = "SELECT id FROM users WHERE phone_number = '$phone_number'";
        $result = mysqli_query($this->conn, $query);

        return (mysqli_num_rows($result) > 0);
    }
}
?>