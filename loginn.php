<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="bootstrap-5.3.3-dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head> 
<body style="background-image: url(asset/bukulogin.jpg);margin: 0;"  >
<div
        class="container"
        style="
        width: 1100px;
        background-color: #042356;
        height: 728px;
        margin: auto;
        margin-top: -20px;
        ">

    <center>
        <div class="container">
            <img src="asset/logo.png" alt="" style="width: 500px; margin-top: 5px">
            <h1 style="color: white; margin-top: -50px; margin-left: -320px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;; ">Login</h1>
            <p style="color: white; margin-top: -11px; margin-left: -37px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">WELCOME BACK PLEASE LOGIN TO YOUR ACCOUNT </p> 
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </center>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form login
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Cek ke database
        if (cek_login($username, $password)) {
            // Login berhasil, redirect ke halaman dashboard atau halaman lainnya
            echo '<script>alert("Data yang anda masukan benar");window.location="menu.php"</script>';
        } else {
            // Login gagal, tampilkan pesan error
            echo '<script>alert("Username atau password salah");window.history.back();</script>';
        }
    }

    function cek_login($username, $password) {
        // Koneksi ke database
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "perpus";

        // Buat koneksi
        $conn = new mysqli($servername, $db_username, $db_password, $database);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Periksa apakah user ada di database dengan menggunakan parameterized query
        $sql = "SELECT * FROM user WHERE Username=? AND pass=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Tutup koneksi
        $conn->close();

        // Cek apakah hasil query menghasilkan data
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    ?>
</body>
</html>
