<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $xml = simplexml_load_file('users.xml');
    foreach ($xml->user as $user) {
        if ($user->username == $username && password_verify($password, $user->password)) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
    }
    echo "Neispravni podaci. <a href='login.php'>Pokušajte ponovo</a>";
}
include('head.php');
?>

<form method="POST" class="form-group">
    <label>Username:</label>
    <input type="text" name="username" class="form-control" required>
    <label>Password:</label>
    <input type="password" name="password" class="form-control" required>
    <input type="submit" value="Login" class="btn btn-custom mt-3">
</form>
<p>Nemate račun? <a href="signup.php">Registrirajte se</a></p>

<?php include('footer.php'); ?>
