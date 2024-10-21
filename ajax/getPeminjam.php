<?php
include '../koneksi.php';

// untuk mendapatkan nilai parameternya.
if (isset($_GET['no_peminjaman'])) {
    $no_peminjam = $_GET['no_peminjaman'];

    // query untuk menadapatkan data peminjam
    $query = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman  LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE no_peminjaman='$no_peminjam'");

    $data = mysqli_fetch_assoc($query);
    $id_peminjaman = $data['id'];
    // query untuk mendapatkan data detail peminjam
    $queryDetail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman LEFT JOIN books ON books.id = detail_peminjaman.id_book WHERE id_peminjaman='$id_peminjaman'");

    $dataDetail = [];
    while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
        $dataDetail[] = $rowDetail;
    };


    $response = ['data' => $data, 'message' => 'fetch success', 'detail_peminjaman' => $dataDetail];
    echo json_encode($response);
}
