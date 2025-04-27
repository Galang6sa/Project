<?php
session_start();
include 'config/app.php';
if (!isset($_SESSION["login"]) || $_SESSION['role'] != 'admin'){
  echo "<script>
  document.location.href = 'index_anggota.php';
  </script>";
  exit;
}

$id = (int)$_GET['id'];

   if (delete_buku($id)) {
       echo "<script>
               alert('Data Berhasil Dihapus');
               document.location.href = 'index_admin.php';
             </script>";
   } else {
       echo "<script>
               alert('Data Gagal Dihapus');
               document.location.href = 'index_admin.php';
             </script>";
   }
?>