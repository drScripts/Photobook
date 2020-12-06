<?php session_start() ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'db/database.php' ?>
<?php
session_unset();
$_SESSION = [];

?>
<?php session_destroy();
echo "<script>alert('anda sudah logout')</script>";
echo "<script>location='index.php'</script>";

?>