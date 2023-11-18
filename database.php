<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="icon" type="image/x-icon" href="img/jaknaweby_logo.png">
    <title>Database uptime check</title>
</head>
</html>

<?php
    $path = "."; include("phpComponents/profileHeader.php");

    $conn = "";

    try {
        $conn = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
        $sql = "SELECT * FROM users";
        $res = mysqli_query($conn, $sql);

        mysqli_close($conn);

        foreach (mysqli_fetch_assoc($res) as $key => $value) {
            echo "{$key} => {$value}<br>";
        }
        echo "You are connected <br>";
    } catch(mysqli_sql_exception) {
        echo "Failed to connect <br>";
    }

    $path = "."; include("phpComponents/footer.php");
?>