<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$xml = simplexml_load_file('songs.xml');
include('head.php');
?>

<h1 class="text-center">Playlist</h1>
<div class="playlist-container">
    <ul class="list-unstyled">
        <?php foreach ($xml->song as $song): ?>
            <li class="mb-3">
                <h3 class="text-center"><?php echo $song->title; ?></h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $song->videoId; ?>" allowfullscreen></iframe>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="text-center">
    <a href="index.php" class="btn btn-custom">Nazad na početnu</a>
    <button id="deletePlaylist" class="btn btn-custom">Obriši sve videozapise</button>
</div>

<script>
    document.getElementById('deletePlaylist').addEventListener('click', function() {
        fetch('delete_playlist.php', {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); 
        })
        .catch(error => {
            console.error('Došlo je do pogreške:', error);
            alert('Došlo je do pogreške pri brisanju playliste. Provjerite konzolu za više detalja.');
        });
    });
</script>

<?php include('footer.php'); ?>
