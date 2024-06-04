<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include('head.php');
?>

<h1>Dobrodošli, <?php echo $_SESSION['username']; ?></h1>
<a href="add_song.php" class="btn btn-custom">Dodaj pjesmu</a>
<a href="playlist.php" class="btn btn-custom">Pogledaj playlistu</a>

<?php include('footer.php'); ?>
