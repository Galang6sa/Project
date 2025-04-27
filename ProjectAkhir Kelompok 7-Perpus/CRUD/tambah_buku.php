<?php
session_start();
include 'layout/header.php';
if (!isset($_SESSION["login"]) || $_SESSION['role'] != 'admin'){
  echo "<script>
  document.location.href = 'index_anggota.php';
  </script>";
  exit;
}
if (isset($_POST['submit'])) {  

   if (create_buku($_POST) > 0) {
       echo "<script>
               alert('Data Buku Berhasil Ditambahkan');
               document.location.href = 'index_admin.php';
             </script>";
   } else {
       echo "<script>
               alert('Data Buku Gagal Ditambahkan');
               document.location.href = 'index_admin.php';
             </script>";
   }
 }
?>


<div class="bg-white rounded-lg flex w-full max-w-lg mx-auto m-20" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
  <div class="grid place-content-center p-8 w-full">
    <form action="" method="post" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-regular mb-2">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Judul Buku">
        </div>

        <div class="mb-4">
            <label for="penulis" class="block text-gray-700 font-regular mb-2">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Nama Penulis">
        </div>

        <div class="mb-4">
            <label for="penerbit" class="block text-gray-700 font-regular mb-2">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Nama Penerbit">
        </div>

        <div class="mb-4">
            <label for="jenis_buku" class="block text-gray-700 font-regular mb-2">Jenis Buku</label>
            <input type="text" name="jenis_buku" id="jenis_buku" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Jenis Buku">
        </div>

        <div class="mb-4">
            <label for="sampul" class="block text-gray-700 font-regular mb-2">Sampul Buku</label>
            <input type="file" name="sampul" id="sampul" class="w-full px-4 py-2 rounded-md font-medium">
        </div>

        <button type="submit" name="submit" class="w-full btn">Tambah Buku</button>
    </form>
  </div>
</div>


<?php
include 'layout/footer.php';
?>
