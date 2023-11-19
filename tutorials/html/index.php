<?php
    $lang = "html";
    $title = "Co je to HTML";
    $path = "../../";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "{$title}"; ?></title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="icon" type="image/x-icon" href="../../img/jaknaweby_logo.png">
</head>

<body>
    <?php
    include("../../phpComponents/header.php");
    ?>

    <main class="w-10/12 m-auto">
        <?php
        $image = ["src" => "html.png", "alt" => "Logo HTML", "title" => "HTML", "items" => ["HTML (HyperText Markup Language) je značkovací jazyk, bez kterého by se neobešel žádný web. Tvoří základní strukturu stránky. Nejčastěji je doplňován jazyky CSS a JavaScriptem. Autorem HTML je Tim Berners-Lee. Nejnovější verze je HTML 5.3 - HTML5."]];
        include("../articleComponents/image.php");
        
        $title = ["title" => "Historie HTML", "items" => ["První verze HTML byla vydána v roce 1990."]];
        include("../articleComponents/title.php");

        $list = ["title" => "Verze 0.9 - 1.2", "items" => ["Nepodporují grafické rozhraní", "Postupně vytvářeny v letech 1991 - 1993"]];
        include("../articleComponents/list.php");

        $list = ["title" => "Verze 2.0", "items" => ["Přidání podpory grafiky", "Vydána v listopadu 1995"]];
        include("../articleComponents/list.php");

        $list = ["title" => "Verze 3.2", "items" => ["Přidány tabulky a stylové prvky", "Datum vydání: 14. ledna 1997"]];
        include("../articleComponents/list.php");

        $list = ["title" => "Verze 4.0", "items" => ["Přidání nových prvků pro tvorbu tabulek a formulářů", "Datum vydání: 18. prosince 1997"]];
        include("../articleComponents/list.php");

        $list = ["title" => "Verze 5.0", "items" => ["Odstranění mnoho nepoužívaných prvků a přidání nových", "Datum vydání: 28. října 2014"]];
        include("../articleComponents/list.php");

        $list = ["title" => "Verze 5.3", "items" => ["Nejnovější verze"]];
        include("../articleComponents/list.php");
        ?>
    </main>

    
    <?php
    include("../../phpComponents/footer.php");
    ?>
</body>

</html>