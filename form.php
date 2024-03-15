<html>
  <body>
    <form method="post" action="form.php">
      <div>
        <label>Hobi:</label>
        <div><input type="checkbox" name="hobi[]" value="kuliner" /> Kuliner</div>
        <div><input type="checkbox" name="hobi[]" value="travel" /> Travelling</div>
        <div><input type="checkbox" name="hobi[]" value="gaming" /> Gaming</div>
        <div><input type="checkbox" name="hobi[]" value="masak" /> Masak</div>
      </div>
      <div>
        <label>Hobi:</label>
        <select name="hobi1[]" multiple>
          <option value="kuliner">Kuliner</option>
          <option value="travel">Travel</option>
          <option value="gaming">Gaming</option>
          <option value="masak">Masak</option>
        </select>
      </div>
      <input type="submit" value="Kirim" />
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'
        && (isset($_POST['hobi']) || isset($_POST['hobi1']))) {
        $hobbies = [
          'kuliner' => 'Kuliner',
          'travel' => 'Travelling',
          'gaming' => 'Gaming',
          'masak' => 'Masak',
        ];

        if (isset($_POST['hobi'])) {
          $hobi = $_POST['hobi'];
          echo "<p>Hobi</p>";
          echo "<ul>";
          /*foreach($hobi as $h) {
            echo "<li>{$hobbies[$h]}</li>";
          }*/
          foreach($hobbies as $key => $value) {
            $checked = in_array($key, $hobi) ? "checked" : "";
            echo "<li><input type='checkbox' value='{$key}' {$checked} /> {$value}</li>";
          }
          echo "</ul>";
        }

        if (isset($_POST['hobi1'])) {
          $hobi1 = $_POST['hobi1'];
          echo "<p>Hobi1</p>";
          echo "<ul>";
          foreach($hobi1 as $h) {
            echo "<li>{$hobbies[$h]}</li>";
          }
          echo "</ul>";
        }

      }
    ?>
  </body>
</html>

