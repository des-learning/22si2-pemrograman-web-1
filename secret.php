<?php
session_start();
// kalau belum login, redirect user ke halaman login
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
  header('Location: login.php'); // redirect ke halaman login
  //echo "<h1>Kamu belum login</h1>"; // atau tampilkan pesan
  die(); // hentikan script
}
?>
<html>
  <body>
    <h1>Dokumen super rahasia</h1>
  </body>
</html>
