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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/global.css">
    <title>Database uptime check</title>
</head>
<body class="flex flex-col min-h-screen">
    <?php $path = "img"; include("phpComponents/footer.php"); ?>
</body>
</html>