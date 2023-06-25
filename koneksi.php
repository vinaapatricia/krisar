<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "grafkom";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    $kritik = $_POST['kritik'];

    // Menghindari serangan injeksi SQL dengan menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO tb_krisar (krisar) VALUES (?)");
    $stmt->bind_param("s", $kritik);

    if ($stmt->execute()) {
        echo "Kritik berhasil dikirim.";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
    

    $stmt->close();
}

// Menutup koneksi
mysqli_close($conn);
?>
