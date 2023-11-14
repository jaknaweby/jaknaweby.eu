<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/global.css">
    </head>
    <body>
        <div class="flex w-fit mx-auto mt-10 font-extralight">
            <?php
                if ($color === -1) {
                    echo "<span class='text-red-800'>{$message}</span>";
                } else if ($color === 0) {
                    echo "<span class='text-yellow-800'>{$message}</span>";
                } else if ($color === 1) {
                    echo "<span class='text-green-800'>{$message}</span>";
                }  
            ?>
        </div>
    </body>
</html>