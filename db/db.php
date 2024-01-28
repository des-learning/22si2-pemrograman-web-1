<html>
<body>
  <h1>List Todo</h1>
  <a href="create_todo.php">Create new Todo</a>
<?php
// CONNECT KE DATABASE
// PDO -> PHP database object, library untuk konek ke database SQL
// parameter 1 - connection string
// parameter 2 - user name untuk koneksi ke db
// parameter 3 - password untuk koneksi ke db
// https://www.php.net/manual/en/book.pdo.php
$pdo = new PDO('mysql:host=127.0.0.1:33060;dbname=web', 'userdb', 'rahasia');

// QUERY
// mengirimkan query ke database untuk melakukan operasi
$q = $pdo->query("select * from todos");

// BACA HASIL QUERY
echo "<ul>";
// $q->fetch -> mengambil 1 baris/record dari operasi query
// parameter 1 (optional) -> bagaimana data disimpan ke variable hasil
// PDO::FETCH_ASSOC -> hasil disimpan menjadi array associative
while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
  echo "<li>";
  /*echo $row['id'] . "|" . $row['title'] . "|" . $row['state'] .
    "|" . $row['created_at'] . "|" . $row["updated_at"];*/
  echo "<span>";
  echo $row['title'] . ": " . $row['state'] . " | ";
  echo '<a href="update_todo.php?id=' . $row['id'] . '">Edit</a>';
  echo " | ";
  echo '<a href="delete_todo.php?id=' . $row['id'] . '">Delete</a>';
  echo "</span>";
  echo "</li>";
}
echo "</ul>";
?>
</body>
</html>
