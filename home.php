<?php
    session_start();

    if (isset($_SESSION["username"])) {
        echo "This is the home page <br>";
        echo "You are logged in as {$_SESSION["username"]}";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="tailwind/style.css">
</head>
<body>
    <form method="post">
        <input type="submit" name="logout" value="Log out">
    </form>
    <form method="post">
        <label for="auth">Password authentication</label>
        <input type="password" name="auth">

        <input type="submit" name="delete" value="Delete account">
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost", "root", "", "jaknaweby.eu");

    if (!empty($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    } elseif (!empty($_POST["delete"])) {
        $userInfo = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'");
        $userFetch = mysqli_fetch_assoc($userInfo);

        if (password_verify($_POST["auth"] . $userFetch["salt"], $userFetch["password"])) {
            mysqli_query($conn, "DELETE FROM users WHERE username = '{$_SESSION["username"]}';");
            session_destroy();
            header("Location: index.php");
        } else {
            echo "Wrong password, try it again";
        }
    }
?>