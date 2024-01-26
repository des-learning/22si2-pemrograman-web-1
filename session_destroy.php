<?php
session_start(); // load data session di server
session_destroy(); // hapus data session
header('Location: session.php'); // redirect ke session.php
?>
