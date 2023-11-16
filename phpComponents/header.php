<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <header>
        <nav class="w-screen bg-stone-950 flex items-center justify-center h-12 relative">
            <a class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900 absolute top-0 left-0"><img src="<?php echo "{$path}"; ?>/img/more.png" alt="hamburger icon" class="h-1/2"></a>

            <ul class="flex text-white items-center text-xl h-full">
                <li class="h-full"><a href="../" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="<?php echo "{$path}"; ?>/img/home.png" alt="home icon" class="h-1/2"></a></li>
                
                <li class="h-full">
                    <a <?php if ($lang != "html") { echo "href='../html'"; } else { echo "href='./'"; } ?> class="font-light py-auto h-full px-6 flex items-center bg-red-600<?php if ($lang != "html") { echo "/20"; } ?> hover:bg-red-600">
                        HTML
                    </a>
                </li>
                
                <li class="h-full">
                    <a <?php if ($lang != "css") { echo "href='../css'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center bg-sky-600<?php if ($lang != "css") { echo "/20"; } ?> hover:bg-sky-600">
                        CSS
                    </a>
                </li>
                
                <li class="h-full">
                    <a <?php if ($lang != "js") { echo "href='../javascript'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center bg-amber-500<?php if ($lang != "js") { echo "/20"; } ?> hover:bg-amber-500">
                        JavaScript
                    </a>
                </li>
                
                <li class="h-full">
                    <a <?php if ($lang != "php") { echo "href='../php'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center bg-indigo-600<?php if ($lang != "php") { echo "/20"; } ?> hover:bg-indigo-600">
                        PHP
                    </a>
                </li>
                
                <li class="h-full">
                    <a <?php if ($lang != "sql") { echo "href='../sql'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center bg-orange-600<?php if ($lang != "sql") { echo "/20"; } ?> hover:bg-orange-600">
                        SQL
                    </a>
                </li>
            </ul>

            <a href="../login.php" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900 absolute top-0 right-0"><img src="<?php echo "{$path}"; ?>/img/user.png" alt="user icon" class="h-1/2"></a>
        </nav>
        <div class="flex justify-center bg-<?php if ($lang === "html") { echo "red-600"; } else if ($lang === "css") { echo "sky-600"; } else if ($lang === "js") { echo "amber-500"; } else if ($lang === "php") { echo "indigo-600"; } else if ($lang === "sql") { echo "orange-600"; } ?>">
            <h1 class="text-5xl font-bold text-white py-20"><?php echo "{$title}"; ?></h1>
        </div>

        <nav class="w-1/6 bg-stone-200 fixed top-12 shadow-2xl flex items-center flex-col" style="height: calc(100vh - 3rem);">
            <h3 class="text-2xl font-semibold m-7">
            <?php
                if ($lang === "html") {
                    echo "HTML";
                } else if ($lang === "css") {
                    echo "CSS";
                } else if ($lang === "js") {
                    echo "JavaScript";
                } else if ($lang === "php") {
                    echo "PHP";
                } else if ($lang === "sql") {
                    echo "SQL";
                }
            ?>            
            </h3>
            <ul class="w-full font-light">
                <?php
                    $itemTitle = "Co je to HTML";
                    include("../../phpComponents/navItem.php");

                    $itemTitle = "Co to jsou tagy";
                    include("../../phpComponents/navItem.php");
                ?>
            </ul>
        </nav>
    </header>
</body>
</html>