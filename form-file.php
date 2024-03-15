<html>
  <body>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="berkas" />
      <input type="submit" value="Upload" />
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['berkas'])) {
  $berkas = $_FILES['berkas'];
  
  echo "<ul>";
  echo "<li>Name: {$berkas['name']}</li>";
  echo "<li>Type: {$berkas['type']}</li>";
  echo "<li>Size: {$berkas['size']}</li>";
  echo "<li>Tmp Name: {$berkas['tmp_name']}</li>";
  echo "<li>Error: {$berkas['error']}</li>";
  echo "<li>Full Path: {$berkas['full_path']}</li>";
  echo "</ul>";

  
  if ($berkas['error'] == UPLOAD_ERR_OK) {
    // generate file name untuk storing
    $target_file = tempnam('./', 'uploaded-');
    if (!$target_file) {
      die("<p>failed generate upload filename</p>");
    }

    // pindahkan file yang diupload ke lokasi penyimpanan permanen
    $filename = $target_file . $berkas['name'];
    if (move_uploaded_file($berkas['tmp_name'], $filename)) {
      $basename = basename($filename);
      echo "<p>Upload berhasil. <a href='{$basename}'>Download</a></p>";
      echo "<p>file di upload ke {$filename}</p>";
    } else {
      echo "<p>Upload gagal</p>";
    }
  }
}
    ?>
  </body>
</html>
