<?php
    session_start();

    function writeMessage(string $messageText, int $messageColor) {
        $message = $messageText;
        $color = $messageColor;
        include("phpComponents/message.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <div class="flex flex-col items-center mt-10">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p class='text-4xl font-medium'>This is the home page</p>";
                echo "<p class='text-xl mt-2'>You are logged in as <span class='text-cyan-800'>{$_SESSION["username"]}</span></p>";
            }
        ?>
    </div>

    <form method="post" class="flex flex-col items-center mt-5">
        <input class="bg-zinc-300 px-7 py-1 rounded text-lg" type="submit" name="logout" value="Log out">
    </form>

    <form method="post" class="flex flex-col items-center mt-10">
        <div class="flex flex-col">            
            <label class="text-lg" for="auth">Password authentication</label>
            <input class="border-2 rounded text-lg pl-1 placeholder:text-base" type="password" name="auth">
        </div>

        <input class="bg-zinc-300 px-7 py-1 rounded text-lg mt-5" type="submit" name="delete" value="Delete account">
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
            writeMessage("Wrong password, try it again", -1);
        }
    }
?>