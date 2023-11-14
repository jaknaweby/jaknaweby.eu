<?php
session_start();

function writeMessage(string $messageText, int $messageColor)
{
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
        <title>@jaknaweby</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/global.css">
    </head>

    <body class="flex flex-col min-h-screen">
        <form method="post" class="flex flex-col items-center mt-10">
            <div class="flex flex-col">
                <label class="text-lg" for="username">Username</label>
                <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="text" name="username" placeholder="Enter a username" required>
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="password">Password</label>
                <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="password" name="password" placeholder="Enter a password" required>
            </div>

            <input class="bg-zinc-300 px-7 py-1 rounded text-xl mt-5 font-light" type="submit" name="login" value="Log in">
        </form>

        <form method="post" class="flex flex-col items-center mt-10">
            <div class="flex flex-col mt-3">
                <label class="text-lg" for="username">Username</label>
                <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="text" name="username" placeholder="Enter a username" required>
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="password">Password</label>
                <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="password" name="password" placeholder="Enter a password" required>
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="passwordConfirm">Confirm password</label>
                <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="password" name="passwordConfirm" placeholder="Enter a password" required>
            </div>

            <input class="bg-zinc-300 px-7 py-1 rounded text-xl mt-5 font-light" type="submit" name="register" value="Register">
        </form>

        <?php  ?>
    </body>

</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "jaknaweby.eu");

// Checks, whether the database is up
if (!empty($conn)) {
    if (isset($_POST["login"])) {
        // Sets the result of SQL query into the $isValid variable
        $isValid = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_POST["username"]}'");

        if (mysqli_num_rows($isValid) > 0) { // If the username was found
            $isValidFetch = mysqli_fetch_assoc($isValid);

            if (password_verify($_POST["password"] . $isValidFetch["salt"], $isValidFetch["password"])) { // If the password is right
                $_SESSION["username"] = $_POST["username"];
                header("Location: home.php");
            } else {
                writeMessage("Invalid username or password", -1);
            }
        } else {
            writeMessage("Invalid username or password", -1);
        }
    } elseif (isset($_POST["register"])) {
        $isTaken = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_POST["username"]}'");

        if (mysqli_num_rows($isTaken) == 0) { // If the username was not found - it is still free
            $usernamePattern = "/(?!.*?[#?!@$%^&*-])(?!.*?[\s]).{5,15}/";
            if (preg_match($usernamePattern, $_POST["username"])) { // If the username is valid
                // RegEx patterm
                // - at least 5 characters
                // - at most 15 characters
                // - no whitespace
                // - no special characters

                if ($_POST["password"] == $_POST["passwordConfirm"]) {
                    // RegEx patterm
                    // - at least one uppercase letter
                    // - at least one lowercase letter
                    // - at least one number
                    // - no whitespace
                    // - at least 12 characters
                    $passwordPattern = "/(?=.*?[A-Z])(?=.*?[a-z])(?=.*?\d)(?!.*?[\s]).{12,}/";
                    if (preg_match($passwordPattern, $_POST["password"])) {
                        $salt = strval(rand(10000, 100000));
                        $hashedPassword = password_hash($_POST["password"] . $salt, PASSWORD_DEFAULT);

                        mysqli_query($conn, "INSERT INTO users (`username`, `password`, `salt`) VALUES ('{$_POST["username"]}', '{$hashedPassword}', '{$salt}');");
                        writeMessage("Succesfully registered", 1);
                    } else {
                        writeMessage("Password not secure enough, it must contain <br>- at least 1 uppercase letter <br>- at least 1 lowercase letter <br>- at least 1 number <br>- at least 12 characters <br>- no whitespace <br>", -1);
                    }
                } else {
                    writeMessage("Passwords must match!", -1);
                }
            } else {
                writeMessage("Username invalid, it must contain<br>- at least 5 characters<br>- at most 15 characters<br>- no whitespace<br>- no special characters<br>", -1);
            }
        } else {
            writeMessage("User with username {$_POST["username"]} already exists", -1);
        }
    }
}

// When user is logged in, it redirects to home.php
if (!empty($_SESSION["username"])) {
    header("Location: home.php");
}

mysqli_close($conn);

$path = ".."; include("../phpComponents/footer.php");
?>