<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@jaknaweby</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="underline">Test heading</h1>

    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter a username" required><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter a password" required><br>
        
        <input type="submit" name="login" value="Log in">
    </form>

    <br>

    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter a username" required><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter a password" required><br>
        
        <input type="submit" name="register" value="Register">
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
                    echo "You are logged in as '{$_POST["username"]}'!";
    
                    $_SESSION["username"] = $_POST["username"];
                    header("Location: home.php");
                } else {

                    echo $_POST["password"] . " " . $isValidFetch["salt"] . "<br>";
                    echo password_hash($_POST["password"], PASSWORD_DEFAULT) . "<br>";
                    echo password_verify(password_hash("LUKASEK127215533", PASSWORD_DEFAULT), $isValidFetch["password"]);
                    echo "You entered wrong username or password <br>";
                }
            } else {
                echo "You entered wrong username or password <br>";
            }
        } elseif (isset($_POST["register"])) {
            $isTaken = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_POST["username"]}'");

            if (mysqli_num_rows($isTaken) == 0) { // If the username was not found
                // RegEx patterm
                // - at least one upper letter
                // - at least one lower letter
                // - at least one number
                // - no whitespace
                // - at least 12 characters
                $pattern = "/(?=.*?[A-Z])(?=.*?[a-z])(?=.*?\d)(?!.*?[\s]).{12,}/";
                if (preg_match($pattern, $_POST["password"])) {
                    $salt = strval(rand(10000, 100000));
                    echo $salt . "<br>";

                    $hashedPassword = password_hash($_POST["password"] . $salt, PASSWORD_DEFAULT);
                    echo $hashedPassword . "<br>";
                    
                    mysqli_query($conn, "INSERT INTO users (`username`, `password`, `salt`) VALUES ('{$_POST["username"]}', '{$hashedPassword}', '{$salt}');");
                } else {
                    echo "Password not secure enough, it must contain <br>- at least 1 upper letter <br>- at least 1 lower letter <br>- at least 1 number <br>- at least 12 characters <br>- no whitespace <br>";
                }
                
                
            } else {
                echo "User with username {$_POST["username"]} already exists";
            }
        }
    }

    // When user is logged in, it redirects to home.php
    if (!empty($_SESSION["username"])) {
        header("Location: home.php");
    }

    mysqli_close($conn);
?>