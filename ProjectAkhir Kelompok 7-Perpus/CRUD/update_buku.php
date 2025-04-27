  <?php
  session_start();
  include 'layout/header.php';
  if (!isset($_SESSION["login"]) || $_SESSION['role'] != 'admin'){
    echo "<script>
    document.location.href = 'index_anggota.php';
    </script>";
    exit;
  }

  $id = (int)$_GET['id'];

  $data_buku = select("SELECT * FROM buku WHERE id_buku = '$id'")[0];


  if (isset($_POST['submit'])) {  

  if (update_buku($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diupdate');
                document.location.href = 'index_admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diupdate');
                document.location.href = 'index_admin.php';
              </script>";
    }
  }
  ?>
  <h1 class="text-center text-4xl font-semibold mt-8">Update Buku</h1>
  <div class="bg-white rounded-lg flex w-full max-w-lg mx-auto m-20" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
    <!-- Form Update Buku -->
    <div class="grid place-content-center p-8 w-full">
      <form action="" method="post" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
          <input type="hidden" name="id_buku" value="<?=$data_buku['id_buku'];?>">
          
          <div class="mb-4">
              <label for="judul" class="block text-gray-700 font-regular mb-2">Judul Buku</label>
              <input type="text" name="judul" value="<?=$data_buku['judul'];?>" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Judul Buku">
          </div>

          <div class="mb-4">
              <label for="penulis" class="block text-gray-700 font-regular mb-2">Penulis</label>
              <input type="text" name="penulis" value="<?=$data_buku['penulis'];?>" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Nama Penulis">
          </div>

          <div class="mb-4">
              <label for="penerbit" class="block text-gray-700 font-regular mb-2">Penerbit</label>
              <input type="text" name="penerbit" value="<?=$data_buku['penerbit'];?>" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Nama Penerbit">
          </div>

          <div class="mb-4">
              <label for="jenis_buku" class="block text-gray-700 font-regular mb-2">Jenis Buku</label>
              <input type="text" name="jenis_buku" value="<?=$data_buku['jenis_buku'];?>" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Jenis Buku">
          </div>

          <div class="mb-4 flex items-center space-x-4">
              <div class="flex-1">
                  <label for="sampul" class="block text-gray-700 font-regular mb-2">Sampul Buku</label>
                  <input type="file" name="sampul" class="w-full px-4 py-2 rounded-md font-medium">
              </div>
              <div class="flex-1 text-center">
                  <img src="img/<?=$data_buku['sampul'];?>" alt="<?=$data_buku['sampul'];?>" class="max-h-48 mx-auto mt-4">
              </div>
          </div>

          <button type="submit" name="submit" class="w-full btn">Update Buku</button>
      </form>
    </div>
  </div>

  <?php
  include 'layout/footer.php';
  ?>