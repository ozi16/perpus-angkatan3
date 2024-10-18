<?php
include '../koneksi.php';

// untuk mendapatkan nilai parameternya.
if (isset($_GET['no_peminjaman'])) {
    $no_peminjam = $_GET['no_peminjaman'];

    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman  LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE no_peminjaman='$no_peminjam'");

    $data = mysqli_fetch_assoc($query);
    $response = ['data' => $data, 'message' => 'fetch success'];
    echo json_encode($response);
}
