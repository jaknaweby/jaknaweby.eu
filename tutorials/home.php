<?php
    session_start();

    function writeMessage(string $messageText, int $messageColor) {
        $message = $messageText;
        $color = $messageColor;
        include("../phpComponents/message.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - <?php echo $_SESSION["username"]; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="icon" type="image/x-icon" href="../img/jaknaweby_logo.png">
</head>
<body>
    <?php $path = ".."; $pageType = "profile"; include("../phpComponents/profileHeader.php"); ?>

    <div class="flex flex-col items-center mt-10">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p class='text-4xl font-medium'>This is the home page</p>";
                echo "<p class='text-xl mt-2 font-light'>You are logged in as <span class='text-cyan-800 font-normal'>{$_SESSION["username"]}</span></p>";
            }
        ?>
    </div>

    <form method="post" class="flex flex-col items-center mt-5">
        <input class="bg-zinc-300 px-7 py-1 rounded text-xl font-light" type="submit" name="logout" value="Log out">
    </form>

    <form method="post" class="flex flex-col items-center mt-10">
        <div class="flex flex-col">            
            <label class="text-lg" for="auth">Password authentication</label>
            <input class="border-2 rounded text-xl pl-1 placeholder:text-base" type="password" name="auth" required>
        </div>

        <input class="bg-zinc-300 px-7 py-1 rounded text-xl mt-3 font-light" type="submit" name="delete" value="Delete account">
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost", "root", "", "jaknaweby.eu");

    if (!empty($_POST["logout"])) {
        session_destroy();
        header("Location: login.php");
    } elseif (!empty($_POST["delete"])) {
        $userInfo = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'");
        $userFetch = mysqli_fetch_assoc($userInfo);

        if (password_verify($_POST["auth"] . $userFetch["salt"], $userFetch["password"])) {
            mysqli_query($conn, "DELETE FROM users WHERE username = '{$_SESSION["username"]}';");
            session_destroy();
            header("Location: login.php");
        } else {
            writeMessage("Wrong password, try it again", -1);
        }
    }

    // When user is not logged in, it redirects to home.php
    if (empty($_SESSION["username"])) {
        header("Location: login.php");
    }

    $path = ".."; include("../phpComponents/footer.php");
?>