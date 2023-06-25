<?php
if (isset($_POST['submit'])) {
    $kritik = $_POST['kritik'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "aranimal";

    $connect = new mysqli($servername, $username, $password, $database);

    if ($connect->connect_error) {
        die("Koneksi gagal: " . $connect->connect_error);
    }

    $sql = "INSERT INTO tb_krisar (data) VALUES ('$data')";

    if ($connect->query($sql) === TRUE) {
        echo "Kritik berhasil dikirim.";
    } else {
        echo "Terjadi kesalahan: " . $connect->error;
    }

    $connect->close();
}
?>
