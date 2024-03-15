<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $pdo = new PDO('mysql:host=127.0.0.1:33060;dbname=web', 'userdb', 'rahasia');

  $q = $pdo->prepare('select * from todos where id = ?');
  $q->execute([$_GET['id']]);
  $row = $q->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
?>
<html>
  <body>
    <p>To Do not found</p>
  </body>
</html>
<?php
  } else {
?>
<html>
  <body>
    <h1>Update TODO</h1>
    <form method="post" action="update_todo.php">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
      <div>
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $row['title'] ?>" />
      </div>
      <div>
        <label>State</label>
        <select name="state" value="<?php echo $row['state'] ?>">
          <option value="0">To do</option>
          <option value="1">In Progress</option>
          <option value="2">Done</option>
        </select>
      </div>
      <div>
        <input type="submit" value="Update" />
      </div>
    </form>
  </body>
</html>
<?php
  }
?>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $pdo = new PDO('mysql:host=127.0.0.1:33060;dbname=web', 'userdb', 'rahasia');

  $q = $pdo->prepare('update todos set title = ?, state = ?, updated_at = now() where id = ?');
  $q->execute([$_POST['title'], $_POST['state'], $_POST['id']]);

  header('Location: db.php');
?>
<?php
} else {
?>
<html><body>Bad Request</body></html>
<?php
}
?>
