<?php
// session_start();
include 'layout/header.php';
// if (!isset($_SESSION["login"]) || $_SESSION['role'] != 'anggota'){
//   echo "<script>
//   alert('Login dulu dek!');
//   document.location.href = 'login.php';
//   </script>";
//   exit;
// }

$data_buku = select("SELECT * FROM buku ORDER BY id_buku DESC");
?>  
<section class="min-h-screen flex flex-col justify-center text-center p-8">
    <h1 class="text-8xl font-medium mb-4">Welcome!<br> To Our Library<span style="color:#ADFF2F;">.</span> </h1>
    <p class="text-lg mb-6">Cari buku yang anda inginkan di perpustakaan kami.</p>
    
    <div class="flex justify-center space-x-4">
      <a href="login.php" class="btn">
        Login
      </a>
      <a href="tambah_akun.php" class="button">
        Daftar
      </a>
    </div>
  </section>
  

  <h2 class="text-4xl font-bold text-center mb-6">Cara Peminjaman</h2>
  <section class="py-20 m-20 bg">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-10">
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;"">
            <h3 class="m-5 text-2xl font-semibold mb-4">Langkah 1</h3>
            <p class="m-5">Masuk atau Daftar akun terlebih dahulu untuk melakukan peminjaman.</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;"">
            <h3 class="m-5 text-2xl font-semibold mb-4">Langkah 2</h3>
            <p class="m-5">Pilih buku yang ingin Anda pinjam dari katalog.</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;"">
            <h3 class="m-5 text-2xl font-semibold mb-4">Langkah 3</h3>
            <p class="m-5">Setelah memilih, klik pinjam dan pilih tanggal pengembalian.</p>
        </div>
    </div>
  </section>
  
  
  <h1 class="text-center text-5xl font-medium mb-3">Katalog<span style="color:#ADFF2F;">.</span> </h1> 
  <p class="text-lg mb-6 text-center" >Login dulu ges!</p>
  
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 m-20">
    <?php foreach ($data_buku as $buku) : ?>
    <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
        <img src="img/<?=$buku["sampul"];?>" alt="<?=$buku["judul"];?>" class="w-full h-64 object-cover">

        <div class="p-4">
            <h3 class="text-xl font-semibold"><?= $buku["judul"]; ?></h3>
            <p class="text-gray-500">Penulis: <?= $buku["penulis"]; ?></p>
            <p class="text-gray-500">Penerbit: <?= $buku["penerbit"]; ?></p>
            <p class="text-gray-500">Jenis: <?= $buku["jenis_buku"]; ?></p>
        </div>

        <div class="p-4 flex justify-end gap-2">
            <a href="pinjam.php?id=<?= $buku['id_buku'];?>" class="btn px-4 py-2">Pinjam</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>


<section class="py-20">
    <h2 class="text-4xl font-medium text-center mb-6">Tim Kami<span style="color:#ADFF2F;">.</span></h2>
    <div class="grid grid-cols-5 md:grid-cols-5 lg:grid-cols-5 gap-8 px-10 m-20 bg p-10">
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
            <img src="bahan\cahyo.png" alt="Team Member 1" class="w-full h-48 object-cover  mb-4">
            <h3 class="text-xl font-semibold ml-4">Cahyo Budi Wibowo</h3>
            <p class="text-gray-600 ml-4 mb-10">Ketua Kelonpok</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
            <img src="bahan/galang.png" alt="Team Member 2" class="w-full h-48 object-cover  mb-4">
            <h3 class="text-xl font-semibold ml-4">Galang Surya Admaja</h3>
            <p class="text-gray-600 ml-4 mb-3">Anggota Kelompok</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
            <img src="bahan/amel.png" alt="Team Member 3" class="w-full h-48 object-cover  mb-4">
            <h3 class="text-xl font-semibold ml-4">Amelia Nur Auni</h3>
            <p class="text-gray-600 ml-4 mb-3">Anggota Kelompok</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
            <img src="bahan/faradhina.png" alt="Team Member 4" class="w-full h-48 object-cover  mb-4">
            <h3 class="text-xl font-semibold ml-4">Faradhina Nazura</h3>
            <p class="text-gray-600 ml-4 mb-3">Anggota Kelompok</p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden" style="border: 2px solid black; box-shadow: 0px 8px 0px #000000;">
            <img src="bahan/kirana.png" alt="Team Member 5" class="w-full h-48 object-cover  mb-4">
            <h3 class="text-xl font-semibold ml-4">Kirana Alifa Ummah</h3>
            <p class="text-gray-600 ml-4 mb-3">Anggota Kelompok</p>
        </div>
    </div>
</section>


<?php
include 'layout/footer.php';
?>