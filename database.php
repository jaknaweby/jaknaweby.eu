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
<body class="flex flex-col min-h-screen">
</body>
</html>

<?php
    $conn = "";

    try {
        $conn = mysqli_connect("localhost", "root", "", "jaknaweby.eu");

        // $sql = "INSERT INTO users (`username`, `password`, `salt`) VALUES ('uzivatel4', 'heslo', 'salty');";
        $sql = "SELECT * FROM users";
        $res = mysqli_query($conn, $sql);

        mysqli_close($conn);

        foreach (mysqli_fetch_array($res) as $key => $value) {
            echo "{$key} => {$value}<br>";
        }
        echo "You are connected <br>";
    } catch(mysqli_sql_exception) {
        echo "Failed to connect <br>";
    }

    $path = "."; include("phpComponents/footer.php");
?>