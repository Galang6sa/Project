<?php
include 'layout/header.php';
?>
<?php
if (isset($_POST['submit'])) {  

  if (create_akun($_POST) > 0) {
      echo "<script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = 'login.php';
            </script>";
  } else {
      echo "<script>
              alert('Data Gagal Ditambahkan');
              document.location.href = 'tambah_akun.php';
            </script>";
  }
}
?>
<div class="bg-white rounded-lg flex w-full max-w-lg mx-auto m-20" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
  <div class="w-1/3">
    <img src="bahan\Rectangle 53.png" alt="Banner Image" class="h-full w-full object-cover rounded-l-lg">
  </div>
  <div class="grid place-content-center p-8 w-2/3">
    <h1 class="text-6xl font-medium mb-6 text-center">Daftar</h1>
    <form action="" method="post">
      <div class="flex space-x-4 mb-4">
        <div class="w-1/2">
          <label for="name" class="block text-gray-700 font-regular mb-2">Nama</label>
          <input type="text" name="nama" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Nama" required>
        </div>
        <div class="w-1/2">
          <label for="role" class="block text-gray-700 font-regular mb-2">Role</label>
          <select name="role" class="button w-full px-4 py-2 rounded-md font-medium" required>
            <option value="member">Member</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>
      <div class="mb-4">
        <label for="username" class="block text-gray-700 font-regular mb-2">Username</label>
        <input type="text" name="username" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Username" required>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-regular mb-2">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Password" required>
      </div>
      <button type="submit" name="submit" value="submit"style="background-color: #ADFF2F;" class="w-full font-medium px-6 py-2 rounded-md hover:bg-gray-100 transition">
        Daftar
      </button>    
    </form>
    <p class="mt-4 text-sm text-center text-gray-600">Sudah memiliki akun? <a href="login.php" class="hover:underline" style="color:green;">Masuk</a></p>
  </div>
</div>

<?php
include 'layout/footer.php';
?>
