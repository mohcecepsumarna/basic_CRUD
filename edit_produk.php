<?php
//memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';
//mengecek apakah di url ada nilai GET id 
if(isset($_GET['id'])){
    //mengambil nilai id dari url dan disimpand dalam varibel $id
    $id = ($_GET['id']);
}

//Menampilkan data dari database yang mempunyai id=$id
$query = "SELECT * FROM produk WHERE id='$id'";
$result = mysqli_query($koneksi, $query);
//jika data gagal diambil maka akan tampil pesan error berikut 
if(!$result){
    die("Query Error: ".mysqli_error($koneksi).
    " _ ".mysqli_error($koneksi)); 
}
//mengambil data dari database
$data = mysqli_fetch_assoc($result);
//apabila data tidak ada GET id maka di jalankan perintah ini
if(!count($data)){
    echo "<script> alert('Data tidak ditemukan pada database');window.location='index.php';</scirpt>";

} else {
    //apapbila tidak ada data GET id maka akan di redirect ke index.php
    echo "<script> alert('Masukkan data id.');window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<title>Produk dengan gambar</title>
<style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
<body>
    <center>
        <h1>Edit Produk <?php echo $data['nama_produk'];  ?></h1>
    </center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
<section class="base">
    <!-- menampung nilai id produk yang akan di edit  -->
<input name="id" value="<?php echo $data['id']; ?>" hidden/>
<div>
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
</div>
<div>
    <label>Deskripsi</label>
    <input type="text" name="deskripi" value="<?php echo $data['deskripsi']; ?>" />
</div>
<div>
    <label>Harga Beli</label>
    <input type="text" name="harga_beli" required="" value="<?php echo $data['harga_beli']; ?>" />
</div>
<div>
    <label>Harga Jual</label>
    <input type="text" name="harga_jual" required="" value="<?php echo $data['harga_jual'];?>" />
</div>
<div>
    <label> Gambar Produk</label>
    <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float:left;margin-bottom: 5px;">
    <input type="file" name="gambar+produk" />
    <i style="float: left;font-size: 11px; color: red">Abaikan jika tidak merubah gambar produk</i>
</div>
<div>
    <button type="submit">Simpan Perubahan</button>
</div>
</section>

</form>
</body>
</html>