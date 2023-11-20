<?php
    session_start();

    if (empty($_SESSION["username"])) {
        header("Location: login.php");
    } else {
        try {
            $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
            $queryResult = mysqli_query($connection, "SELECT isAdmin FROM users WHERE username = '{$_SESSION["username"]}'");

            if (mysqli_num_rows($queryResult) > 0) {
                $fetchedResult = mysqli_fetch_row($queryResult);
                
                if ($fetchedResult[0] != 1) {
                    header("Location: home.php");
                }
            } else {
                header("Location: home.php");
            }
        } catch (Exception $e) {
            header("Location: home.php");
        }
    }

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
    <title>Atricles management</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="icon" type="image/x-icon" href="../img/jaknaweby_logo.png">
</head>

<body>
    <?php $path = ".."; $pageType = "article"; include("../phpComponents/profileHeader.php"); ?>

    <form method="post" class="flex flex-col items-center mt-10 text-lg">
        <div class="flex">
            <div class="mr-5">
                <input type="radio" name="language" id="html" value="html" required>
                <label for="html">HTML</label>
            </div>

            <div class="mr-5">
                <input type="radio" name="language" id="css" value="css">
                <label for="css">CSS</label>
            </div>

            <div class="mr-5">
                <input type="radio" name="language" id="js" value="js">
                <label for="js">JavaScript</label>
            </div>

            <div class="mr-5">
                <input type="radio" name="language" id="php" value="php">
                <label for="php">PHP</label>
            </div>

            <div>
                <input type="radio" name="language" id="sql" value="sql">
                <label for="sql">SQL</label>
            </div>
        </div>

        <div class="flex flex-col mt-3">
            <label for="title">Title</label>
            <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="text" name="title" placeholder="Enter a page title" required>
        </div>

        <div class="flex flex-col mt-3">
            <label for="url">URL</label>
            <input class="border-2 rounded text-xl pl-1 placeholder:text-base font-light" type="text" name="url" placeholder="Enter a page url - file name" required>
        </div>

        <!-- <div class="flex flex-col mt-3">
            <label for="content">Content</label>
            <textarea class="border-2 rounded pl-1 text-base placeholder:text-base font-light" name="content" id="content" cols="60" rows="10" placeholder="Enter the content of the page" required></textarea>
        </div>

        <input class="bg-zinc-300 px-7 py-1 rounded text-xl mt-5 font-light" type="submit" name="submit" value="Add article"> -->
    </form>

    <div class="w-11/12 m-auto mt-10">
        <div class="text-2xl font-medium mb-5">Page structure - used components</div>
        <!-- Components ui added by PHP -->
        <?php
        $itemIndex = 0;
        $titleIndex = 0;

        $sequence = ["title", "list"];
        $title = ["title", "l-items"];

        foreach ($sequence as $sequenceItem) {
            echo "<div class=\"text-xl\">" . ucfirst($sequenceItem) . " component</div>";
            
            $currentItems;
            switch ($sequenceItem) {
                case "title":
                    $currentItems = $title;
                    break;
            }

            foreach ($currentItems as $componentItem) {
                if (str_starts_with($componentItem, "l-")) {
                    echo "<label class=\"font-light\">" . ucfirst(substr($componentItem, 2)) . " - is a list</label><br>";
                    echo "<textarea name=\"\" id=\"\" cols=\"100\" rows=\"1\" class=\"border-2 rounded text-xl pl-1 placeholder:text-base font-light\"></textarea><br>";
                } else {
                    echo "<label class=\"font-light\">" . ucfirst($componentItem) . "</label><br>";
                    echo "<input type=\"text\" class=\"border-2 rounded text-xl pl-1 placeholder:text-base font-light\"><br>";
                }
            }
            
        }
        ?>
    </div>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    try {
        $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
        $queryResult = mysqli_query($connection, "SELECT * FROM articles_{$_POST["language"]} WHERE url = '{$_POST["url"]}' OR title = '{$_POST["title"]}'");

        // --------------------------------
        if (mysqli_num_rows($queryResult) === 0) {
            mysqli_query($connection, "INSERT INTO articles_{$_POST["language"]} (`title`, `url`) VALUES ('{$_POST["title"]}', '{$_POST["url"]}.php')");
            
            $myfile = null;
            if ($_POST["language"] === "html") {
                $myfile = fopen("html/{$_POST['url']}.php", "w");
            } else if ($_POST["language"] === "css") {
                $myfile = fopen("css/{$_POST['url']}.php", "w");
            } else if ($_POST["language"] === "js") {
                $myfile = fopen("javascript/{$_POST['url']}.php", "w");
            } else if ($_POST["language"] === "php") {
                $myfile = fopen("php/{$_POST['url']}.php", "w");
            } else if ($_POST["language"] === "sql") {
                $myfile = fopen("sql/{$_POST['url']}.php", "w");
            }
        
            fwrite($myfile,"<?php
    \$lang = \"{$_POST["language"]}\";
    \$title = \"{$_POST["title"]}\";
    \$path = \"../../\";
?>
        
<!DOCTYPE html>
<html lang=\"en\">
        
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title><?php echo \"{\$title}\"; ?></title>
        
    <link rel=\"stylesheet\" href=\"../../css/style.css\">
    <link rel=\"stylesheet\" href=\"../../css/global.css\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"../../img/jaknaweby_logo.png\">
</head>
        
<body>
    <?php include(\"../../phpComponents/header.php\"); ?>
        
    {$_POST["content"]}
        
    <?php include(\"../../phpComponents/footer.php\"); ?>
</body>
        
</html>");
        // --------------------------------
            writeMessage("File added", 1);
            fclose($myfile);
        } else {
            writeMessage("This title / url address is already in use", -1);
        }

        mysqli_close($connection);
    } catch (Exception $e) {
        echo $e;
    }
}

$path = ".."; include("../phpComponents/footer.php");
?>