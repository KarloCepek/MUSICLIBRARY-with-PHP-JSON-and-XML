<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $xml = simplexml_load_file('users.xml');
    $newUser = $xml->addChild('user');
    $newUser->addChild('username', $username);
    $newUser->addChild('password', password_hash($password, PASSWORD_DEFAULT));
    $xml->asXML('users.xml');

    echo "Registracija uspješna. <a href='login.php'>Prijavite se</a>";
}
?>

<form method="POST">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Register">
</form>
