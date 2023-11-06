<?php
    session_start();

    if (isset($_SESSION["username"])) {
        echo "This is the home page <br>";
        echo "You are logged in as {$_SESSION["username"]}";
    } else {
        echo "You need to log in first!";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="logout" value="Log out">
    </form>
</body>
</html>

<?php
    if (!empty($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
?>