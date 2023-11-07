<?php
    session_start();

    function writeMessage(string $someMessage) {
        $message = $someMessage;
        include("phpComponents/message.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@jaknaweby</title>
        <link rel="stylesheet" href="tailwind/style.css">
    </head>
    <body>
        <form method="post" class="flex flex-col items-center">
            <div class="flex flex-col">
                <label class="text-lg" for="username">Username</label>
                <input class="border-2 rounded text-lg pl-1" type="text" name="username" placeholder="Enter a username" required>
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="password">Password</label>
                <input class="border-2 rounded text-lg pl-1" type="password" name="password" placeholder="Enter a password" required>
            </div>

            <input class="bg-zinc-300 px-7 py-1 rounded text-lg mt-5" type="submit" name="login" value="Log in">
        </form>

        <form method="post" class="flex flex-col items-center mt-10">
            <div class="flex flex-col">
                <label class="text-lg" for="username">Username</label>
                <input class="border-2 rounded text-lg pl-1" type="text" name="username" placeholder="Enter a username" required>
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="password">Password</label>
                <input class="border-2 rounded text-lg pl-1" type="password" name="password" placeholder="Enter a password" required>
            </div>

            <input class="bg-zinc-300 px-7 py-1 rounded text-lg mt-5" type="submit" name="register" value="Register">
        </form>
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

                if (password_verify($_POST["password"] . $isValidFetch["salt"], $isValidFetch["password"])) {
                    $_SESSION["username"] = $_POST["username"];
                    header("Location: home.php");
                } else {
                    writeMessage("Invalid username or password");
                }
            } else {
                writeMessage("Invalid username or password");
            }
        } elseif (isset($_POST["register"])) {
            $isTaken = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_POST["username"]}'");

            if (mysqli_num_rows($isTaken) == 0) { // If the username was not found
                // RegEx patterm
                // - at least one uppercase letter
                // - at least one lowercase letter
                // - at least one number
                // - no whitespace
                // - at least 12 characters
                $pattern = "/(?=.*?[A-Z])(?=.*?[a-z])(?=.*?\d)(?!.*?[\s]).{12,}/";
                if (preg_match($pattern, $_POST["password"])) {
                    $salt = strval(rand(10000, 100000));
                    // echo $salt . "<br>";

                    $hashedPassword = password_hash($_POST["password"] . $salt, PASSWORD_DEFAULT);
                    // echo $hashedPassword . "<br>";

                    mysqli_query($conn, "INSERT INTO users (`username`, `password`, `salt`) VALUES ('{$_POST["username"]}', '{$hashedPassword}', '{$salt}');");
                    writeMessage("Succesfully registered");
                } else {
                    writeMessage("Password not secure enough, it must contain <br>- at least 1 uppercase letter <br>- at least 1 lowercase letter <br>- at least 1 number <br>- at least 12 characters <br>- no whitespace <br>");
                }
            } else {
                writeMessage("User with username {$_POST["username"]} already exists");
            }
        }
    }

    // When user is logged in, it redirects to home.php
    if (!empty($_SESSION["username"])) {
        header("Location: home.php");
    }

    mysqli_close($conn);
?>