<?php
session_start();
if (isset($_POST['nama'])) {
  $_SESSION['nama'] = $_POST['nama'];
}
?>
<html>
<body>
  <form action="session.php" method="post">
    <div>
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama">
    </div>
    <div>
      <input type="submit">
    </div>
  </form>
<?php
if (isset($_SESSION['nama'])) {
  echo "<h1>Hello " . $_SESSION['nama'] . "</h1>";
}
?>
</body>
</html>
