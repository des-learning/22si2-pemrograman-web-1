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
  $pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=web', 'userdb', 'rahasia');
  $title = $_POST['title'];

  try {
    $pdo->beginTransaction();
    // insert data todo
    $sql='insert into todos(title, created_at, updated_at) values(?, now(), now())';
    $q = $pdo->prepare($sql);
    if (!$q) {
      throw new Exception('failed to prepare query');
    }
    $r = $q->execute([$title]);
    if (!$r) {
      throw new Exception('query execution failed');
    }
    // get last inserted data
    $sql ='select id, title, state from todos where id = last_insert_id();';
    $q = $pdo->query($sql);
    $row = $q->fetch();
    $id = $row[0];
    // insert data todo_logs
    $sql='insert into todo_logs(todo_id, operation, created_at) values(?, ?, now())';
    $q = $pdo->prepare($sql);
    $q->execute([$id, "created new todo \"{$row[1]}\" with state: {$row[2]}"]);
    $pdo->commit();
  } catch(Exception $e) {
    $pdo->rollBack();
    die("Error persisting data: {$e->getMessage()}");
  }

  header('location: db.php');
?>
<?php
} else {
  echo "Bad Request";
}
?>
