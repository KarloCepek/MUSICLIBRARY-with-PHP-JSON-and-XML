<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

function getYouTubeVideoId($url) {
    $videoId = '';
    if (preg_match('/youtu\.be\/([^\?\/]+)/', $url, $matches)) {
        $videoId = $matches[1];
    } elseif (preg_match('/youtube\.com.*?v=([^&]+)/', $url, $matches)) {
        $videoId = $matches[1];
    } elseif (preg_match('/youtube\.com\/embed\/([^\?\/]+)/', $url, $matches)) {
        $videoId = $matches[1];
    } elseif (preg_match('/youtube\.com\/v\/([^\?\/]+)/', $url, $matches)) {
        $videoId = $matches[1];
    }

    return $videoId;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $videoId = getYouTubeVideoId($link);

    if (!$videoId) {
        echo "Nevažeći YouTube link. <a href='add_song.php'>Pokušajte ponovo</a>";
        exit();
    }

    $xml = simplexml_load_file('songs.xml');
    $newSong = $xml->addChild('song');
    $newSong->addChild('title', $title);
    $newSong->addChild('videoId', $videoId);
    $newSong->addChild('username', $_SESSION['username']);
    $xml->asXML('songs.xml');

    echo "Pjesma dodana. <a href='index.php'>Nazad na početnu</a>";
}
include('head.php');
?>

<form method="POST" class="form-group">
    <label>Naslov pjesme:</label>
    <input type="text" name="title" class="form-control" required>
    <label>YouTube link:</label>
    <input type="text" name="link" class="form-control" required>
    <input type="submit" value="Dodaj pjesmu" class="btn btn-custom mt-3">
</form>

<?php include('footer.php'); ?>
