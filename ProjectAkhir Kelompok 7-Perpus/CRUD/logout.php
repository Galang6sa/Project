<?php
session_start();

if (!isset($_SESSION["login"])){
  echo "<script>
  alert('anda sudah logout');
  document.location.href = 'index_guest.php';
  </script>";
  exit;
}

$_SESSION = [];

session_unset();
session_destroy();
header("Location: index_guest.php");
?>
