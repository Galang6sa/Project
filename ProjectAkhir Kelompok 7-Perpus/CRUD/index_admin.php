<?php
session_start();
include 'layout/header.php';

$data_peminjaman = select("
    SELECT 
        peminjaman.id_pinjam, 
        buku.judul AS judul_buku, 
        akun.nama AS nama_peminjam, 
        peminjaman.tgl_pinjam, 
        peminjaman.tgl_kembali 
    FROM peminjaman 
    JOIN buku ON peminjaman.id_buku = buku.id_buku 
    JOIN akun ON peminjaman.id_akun = akun.id_akun
    ORDER BY peminjaman.id_pinjam DESC
");


if (!isset($_SESSION["login"]) || $_SESSION['role'] != 'admin'){
  echo "<script>
  document.location.href = 'index_member.php';
  </script>";
  exit;
}

$data_buku = select("SELECT * FROM buku ORDER BY id_buku DESC");
?>  


  <section class="min-h-screen flex flex-col justify-center text-center p-8">
    <h1 class="text-8xl font-medium mb-4">Welcome!<br> To Our Library<span style="color:#ADFF2F;">.</span> </h1>
    <p class="text-lg mb-6">Cari buku yang anda inginkan di perpustakaan kami.</p>
    
    <div class="flex justify-center space-x-4">
      <a href="katalog.php" class="btn">
        Katalog Buku
      </a>
      <a href="kontak.php" class="button">
        Kontak
      </a>
    </div>
  </section>
  
  <h1 class="text-center text-5xl font-medium mb-3">Katalog<span style="color:#ADFF2F;">.</span> </h1> 
  <p class="text-lg mb-6 text-center" >Iyo min admin!</p>
  
  <a href="tambah_buku.php" class="btn ml-20">Add Buku</a>
  <a href="logout.php" class="button">Logout</a>
  
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
            <a href="update_buku.php?id=<?= $buku['id_buku'];?>" class="button px-4 py-2" style="background-color:yellow;">Update</a>
            <a href="delete_buku.php?id=<?= $buku['id_buku'];?>" class="button px-2 py-2" style="background-color:red;">Delete</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>


<h2 class="text-center text-4xl font-medium mt-12">Data Peminjaman</h2>
<div class="overflow-x-auto m-20">
    <table class="min-w-full bg-white border border-black">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Nama Peminjam</th>
                <th class="py-2 px-4 border">Judul Buku</th>
                <th class="py-2 px-4 border">Tanggal Pinjam</th>
                <th class="py-2 px-4 border">Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data_peminjaman as $peminjaman) : ?>
                <tr class="border-b">
                    <td class="py-2 px-4 border text-center"><?= $i++; ?></td>
                    <td class="py-2 px-4 border"><?= $peminjaman['nama_peminjam']; ?></td>
                    <td class="py-2 px-4 border"><?= $peminjaman['judul_buku']; ?></td>
                    <td class="py-2 px-4 border"><?= $peminjaman['tgl_pinjam']; ?></td>
                    <td class="py-2 px-4 border"><?= $peminjaman['tgl_kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php
include 'layout/footer.php';
?>