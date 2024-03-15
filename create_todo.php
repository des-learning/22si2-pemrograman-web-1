<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<html>
  <body>
    <h1>New Todo</h1>
    <form method="post" action="create_todo.php">
      <div>
        <label>Title</label>
        <input type="text" name="title">
      </div>
      <div><input type="submit" value="Save"></div>
    </form>
  </body>
</html>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $pdo = new PDO('mysql:host=127.0.0.1:33060;dbname=web', 'userdb', 'rahasia');
  $title = $_POST['title'];
  $sql='insert into todos(title, created_at, updated_at) values(?, now(), now())';
  $q = $pdo->prepare($sql);
  $q->execute([$title]);
  header('location: db.php');
?>
<?php
} else {
  echo "Bad Request";
}
?>
