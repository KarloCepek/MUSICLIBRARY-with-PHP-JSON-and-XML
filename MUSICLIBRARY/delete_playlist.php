<?php
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $xml = simplexml_load_file('songs.xml');

    unset($xml->song);


    $xml->asXML('songs.xml');


    header('Content-Type: application/json');
    echo json_encode(array('message' => 'Svi videozapisi su uspješno obrisani iz playliste.'));
} else {
 
    header('Content-Type: application/json');
    http_response_code(405);
    echo json_encode(array('error' => 'Dozvoljeni su samo DELETE zahtjevi.'));
}
?>
