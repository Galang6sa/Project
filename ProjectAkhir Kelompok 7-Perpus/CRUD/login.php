<?php
// session_start();
include 'layout/header.php';

if (isset($_POST['login'])) {  
  login($_POST);
}
?>
<div class="bg-white rounded-lg flex w-full max-w-lg mx-auto m-20" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
  <!-- Side Banner -->
  <div class="w-1/3">
    <img src="bahan\Rectangle 53.png" alt="Banner Image" class="h-full w-full object-cover rounded-l-lg">
  </div>
  <!-- Form Login -->
  <div class="grid place-content-center p-8 w-2/3">
    <h1 class="text-6xl font-medium mb-6 text-center">Masuk</h1>
    <form action="" method="post">
      <div class="mb-4">
        <label for="username" class="block text-gray-700 font-regular mb-2">Username</label>
        <input type="text" name="username" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Username" required>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-regular mb-2">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 rounded-md font-medium" placeholder="Masukkan Password" required>
      </div>
      <button type="submit" name="login" style="background-color: #ADFF2F;" class=" w-full font-medium px-6 py-2 rounded-md hover:bg-gray-100 transition">
        Login
      </button>    
    </form>
    <p class="mt-4 text-sm text-center text-gray-600">Belum memiliki akun? <a href="tambah_akun.php" class="hover:underline" style="color:green;">Daftar</a></p>
  </div>
</div>

<?php
include 'layout/footer.php';
?>
