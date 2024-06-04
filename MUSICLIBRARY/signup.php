<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Lozinke se ne podudaraju. <a href='signup.php'>Pokušajte ponovo</a>";
        exit();
    }

    if (!file_exists('users.xml')) {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><users></users>');
        $xml->asXML('users.xml');
    }

    $xml = simplexml_load_file('users.xml');
    if ($xml === false) {
        echo "Greška pri učitavanju XML datoteke.";
        exit();
    }

    foreach ($xml->user as $user) {
        if ($user->username == $username) {
            echo "Korisničko ime već postoji. <a href='signup.php'>Pokušajte ponovo</a>";
            exit();
        }
    }

    $newUser = $xml->addChild('user');
    $newUser->addChild('username', $username);
    $newUser->addChild('password', password_hash($password, PASSWORD_DEFAULT));
    $xml->asXML('users.xml');

    echo "Registracija uspješna. <a href='login.php'>Prijavite se</a>";
}
include('head.php');
?>

<form method="POST" class="form-group">
    <label>Username:</label>
    <input type="text" name="username" class="form-control" required>
    <label>Password:</label>
    <input type="password" name="password" class="form-control" required>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" class="form-control" required>
    <input type="submit" value="Sign Up" class="btn btn-custom mt-3">
</form>

<?php include('footer.php'); ?>
