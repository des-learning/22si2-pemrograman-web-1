<?php
session_start();
// kalau sudah login sebelumnya redirect ke halaman secret
if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
  header("Location: secret.php");
  die();
}

// apakah ada data login yang dikirim
if (isset($_POST["username"]) && isset($_POST["password"])) {
  // jika data login benar, set session authenticated dan redirect ke secret
  if ($_POST['username'] == 'user' && $_POST['password'] == 'password') {
    $_SESSION['authenticated'] = true; // loginkan user, set session authenticated ke true
    header("Location: secret.php");
    die();
  } else { // pesan error kalau data login salah
    $error = 'Login salah';
  }
}
?>
<html>
  <body>
    <form method="post" action="login.php">
      <div>
        <label>Username</label>
        <input type="text" name="username" />
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" />
      </div>
      <div><input type="submit" value="login" /></div>
    </form>
    <!-- tampilkan pesan error jika ada -->
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
  </body>
</html>
