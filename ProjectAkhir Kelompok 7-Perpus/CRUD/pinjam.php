<?php
session_start();
include 'layout/header.php';

if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Login dulu dek!');
            document.location.href = 'login.php';
          </script>";
    exit;
}

if (!isset($db)) {
    die("Koneksi ke database tidak ditemukan.");
}

$id_buku = (int)$_GET['id'];
$data_buku = select("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+5 days'));

if (isset($_POST['pinjam'])) {
    $nama_peminjam = $_POST['nama'];
    $id_buku = $_POST['id_buku'];
    $id_akun = $_SESSION['id_akun'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = date('Y-m-d', strtotime('+5 days'));

    $query = "INSERT INTO peminjaman (id_buku, id_akun, nama_peminjam, tgl_pinjam, tgl_kembali) 
              VALUES ('$id_buku', '$id_akun', '$nama_peminjam', '$tgl_pinjam', '$tgl_kembali')";

    if (mysqli_query($db, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index_anggota.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan: " . mysqli_error($db) . "');
              </script>";
    }
}
?>

<h1 class="text-center text-4xl font-semibold mt-8">Form Peminjaman Buku</h1>
<div class="bg-white rounded-lg flex w-full max-w-lg mx-auto m-20" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
  <div class="grid place-content-center p-8 w-full">

    <div class="text-center mb-6">
      <img src="img/<?=$data_buku['sampul'];?>" alt="<?=$data_buku['judul'];?>" class="w-40 h-60 mx-auto object-cover rounded-md" style="border: 2px solid black; box-shadow: 0px 4px 0px #000000;">
      <h2 class="mt-4 text-xl font-medium"><?=$data_buku['judul'];?></h2>
    </div>

    <form action="" method="post" class="w-full max-w-lg mx-auto">

      <input type="hidden" name="id_buku" value="<?= $id_buku; ?>">

      <div class="mb-4">
        <label for="tgl_pinjam" class="block text-gray-700 font-regular mb-2">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" class="w-full px-4 py-2 rounded-md font-medium bg-gray-100 cursor-not-allowed" readonly>
      </div>

      <div class="mb-4">
        <label for="tgl_kembali" class="block text-gray-700 font-regular mb-2">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>" class="w-full px-4 py-2 rounded-md font-medium bg-gray-100 cursor-not-allowed" readonly>
      </div>

      <button type="submit" name="pinjam" class="w-full btn mb-6">Pinjam Buku</button>
    </form>
  </div>
</div>

<?php
include 'layout/footer.php';
?>

