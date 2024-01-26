<?php
if (isset($_POST['nama'])) {
  if ($_POST["nama"] == 'destroy') {
    setcookie('nama', '', -1);
  } else {
    setcookie('nama', $_POST['nama']);
  }
}
?>
<html>
<body>
  <form action="cookie.php" method="post">
    <div>
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama">
    </div>
    <div>
      <input type="submit">
    </div>
  </form>
<?php
  if (isset($_COOKIE["nama"])) {
    echo "<h1>Hello " . $_COOKIE['nama'] . "</h1>";
  }
?>
</body>
</html>
