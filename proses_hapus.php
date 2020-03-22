<?php
include 'koneksi.php';
$id = $_GET["id"];
//Mengambil id yang ingin dihapus

    //Jalankan query DELETE untuk menghapus data 
    $query = "DELETE FROM produk WHERE id='$id' ";
    $hasil_query = mysqli_query($koenksi, $query);

    //periksa query, apakah ada kesalahan 
    if(!$hasil_query){
        die ("Gagal menghapus data: ".mysqli_error($koneksi)).
        " _ ".mysqli_error($koenksi));
    }else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }

?>