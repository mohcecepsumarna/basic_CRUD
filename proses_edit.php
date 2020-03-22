<?php
//memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

    //membuat variable untuk menampung data dari form
    $id = $_POST['id'];
    $nama_produk    = $_POST['nama_produk'];
    $deskripsi      = $_POST['deskripsi'];
    $harga_beli     = $_POST['harga_beli'];
    $harga_jual     = $_POST['harga_jual'];
    $gambar_produk  = $_FILES['gambar_produk']['name'];
    //cek dulu jika merubah gambar produk jalankan script ini ya.
    if($gambar_produk != ""){
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode(',', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp =  $_FILES['gambar_produk']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'_'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya 
        if(in_array($ekstensi, $ekstensi_diperbolehkan)=== true) {
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
            $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_produk = '$gambar_produk_baru'";
            $query = "WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            //Periksa jika query ada yang error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_error($koneksi)).
                " _ ".mysqli_error($koneksi);
            }else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
            }
        }
    }


?>