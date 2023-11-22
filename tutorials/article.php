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

    <?php
        $file;

        try {
            $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");

            if (isset($_POST["create"])) {
                $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
                $result = mysqli_query($connection, "SELECT * FROM articles WHERE language = '{$_POST["language"]}' AND LOWER(title) = '" . strtolower(trim($_POST["title"])) . "' OR language = '{$_POST["language"]}' AND pagename = '" . strtolower(trim($_POST["pagename"])) . ".php'");

                if (mysqli_num_rows($result) > 0) {
                    writeMessage("This title / pagename for this language is already in use", -1);
                } else {
                    mysqli_query($connection, "INSERT INTO articles (`title`, `pagename`, `language`) VALUES ('" . ucfirst(trim($_POST["title"])) . "', '" . strtolower(trim($_POST["pagename"])) . ".php', '{$_POST["language"]}')");
                }
            } else {
                foreach ($_POST as $file => $action) {
                    $file = explode("/", str_replace("_", ".", $file));

                    $res = mysqli_query($connection, "SELECT * FROM articles WHERE language = '{$file[0]}' AND pagename = '{$file[1]}'");

                    if (mysqli_num_rows($res) > 0) {
                        if ($action == "Remove") {
                            mysqli_query($connection, "DELETE FROM articles WHERE language = '{$file[0]}' AND pagename = '{$file[1]}'");
                        } else if ($action == "Edit") {
                            writeMessage("Edit will be added in the future", 0);


                        }
                    } else {
                        writeMessage("File '{$file[0]}/{$file[1]}' not found", -1);
                    }
                }
            }
        } catch (Exception $e) {
            writeMessage($e, -1);
        }

        
    ?>

    <h2 class="text-center text-3xl font-semibold mt-16">Content management</h2>
    <table class="w-11/12 mx-auto mt-8 bg-zinc-200 text-lg text-center p-3 font-light">
        <!-- Edit / remove a file -->
        <form method="post">
            <tr class="bg-zinc-400/50">
                <th class="w-4/12">Title</th>
                <th class="w-3/12">Pagename</th>
                <th class="w-2/12">Language</th>
                <th class="w-1/12">Published</th>
                <th class="w-1/12"></th>
                <th class="w-1/12"></th>
            </tr>

            <!-- Loads all articles from database -->
            <?php
                $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
                
                $articles = mysqli_query($connection, "SELECT title, pagename, language, published FROM articles");
                $articles = mysqli_fetch_all($articles);
                $articleIndex = 1;
            ?>

            <?php foreach ($articles as $article) { ?>
                <tr <?php if ($articleIndex % 2 == 0) { echo "class=\"bg-zinc-300\""; } $articleIndex++; ?>>
                    <td><?php echo $article[0]; ?></td> <!-- Title -->
                    <td><?php echo substr($article[1], 0, -4); ?></td> <!-- Pagename -->
                    <td><?php echo strtoupper($article[2]); ?></td> <!-- Language -->
                    <td><?php echo $article[3]; ?></td> <!-- Published -->
                    <td><input type="submit" value="Remove" name="<?php echo $article[2] . "/" . $article[1] ?>" class="h-full w-full hover:bg-zinc-400/25"></td> <!-- Make a button to remove -->
                    <td><input type="submit" value="Edit" name="<?php echo $article[2] . "/" . $article[1] ?>" class="h-full w-full hover:bg-zinc-400/25"></td> <!-- Make a button to edit -->
                </tr>
            <?php } ?>
        </form>

        <!-- Create a file -->
        <form method="post">
            <tr class="w-full <?php if ($articleIndex % 2 == 0) { echo "bg-zinc-300"; } $articleIndex++; ?>">
                <td><input type="text" name="title" class="h-full w-full text-center bg-transparent" required autocomplete="off"></td> <!-- Title -->
                <td><input type="text" name="pagename" class="h-full w-full text-center bg-transparent" required autocomplete="off"></td> <!-- Pagename -->
                <td>
                    <select name="language" class="h-full w-full text-center bg-transparent" required>
                        <option disabled selected value>select a language</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="js">JavaScript</option>
                        <option value="php">PHP</option>
                        <option value="sql">SQL</option>
                    </select>
                </td> <!-- Language -->
                <td>-</td>
                <td>-</td>
                <td><input type="submit" value="Create" name="create" class="h-full w-full hover:bg-zinc-400/25"></td>
            </tr>
        </form>
    </table>    
</body>

</html>

<?php
/*
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
} */

$path = ".."; include("../phpComponents/footer.php");
?>