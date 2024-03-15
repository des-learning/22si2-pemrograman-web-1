<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=web', 'userdb', 'rahasia');

  $q = $pdo->prepare('select * from todos where id = ?');
  $q->execute([$_GET['id']]);
  $row = $q->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
?>
<html>
  <body>
    <p>Todo not found</p>
    <a href="db.php">Back</a>
  </body>
</html>
<?php
  } else {
?>
<html>
  <body>
    <h1>To Do</h1>
    <ul>
      <li>ID: <?php echo $row['id'] ?></li>
      <li>Title: <?php echo $row['title'] ?></li>
      <li>State: <?php echo $row['state'] ?></li>
      <li>Created At: <?php echo $row['created_at'] ?></li>
      <li>Updated At: <?php echo $row['updated_at'] ?></li>
    </ul>
    <form method="post" action="delete_todo.php">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
      <input type="submit" value="Delete" />
    </form>
  </body>
</html>
<?php
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=web', 'userdb', 'rahasia');

  $q = $pdo->prepare('delete from todos where id = ?');
  $q->execute([$_POST['id']]);

  header('location: db.php');
} else {
?>
  <html><body>Bad Request</body></html>
<?php
}
?>
