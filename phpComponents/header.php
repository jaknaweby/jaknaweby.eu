<?php
    $lang = "html";
    $title = "Co je to HTML";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="w-screen bg-gray-950 flex items-center justify-center h-16">
            <ul class="flex text-white items-center text-xl h-full">
                <li class="h-full"><a href=".." class="py-auto h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="../img/home.png" alt="" class="h-1/2"></a></li>
                
                <li class="h-full">
                    <a href="" class="py-auto h-full px-6 flex items-center bg-red-600<?php if ($lang != "html") { echo "/20"; } ?> hover:bg-red-600">
                        HTML
                    </a>
                </li>
                
                <li class="h-full">
                    <a href="#" class="py-auto h-full px-6 flex items-center bg-sky-600<?php if ($lang != "css") { echo "/20"; } ?> hover:bg-sky-600">
                        CSS
                    </a>
                </li>
                
                <li class="h-full">
                    <a href="#" class="py-auto h-full px-6 flex items-center bg-amber-500<?php if ($lang != "js") { echo "/20"; } ?> hover:bg-amber-500">
                        JavaScript
                    </a>
                </li>
                
                <li class="h-full">
                    <a href="#" class="py-auto h-full px-6 flex items-center bg-indigo-600<?php if ($lang != "php") { echo "/20"; } ?> hover:bg-indigo-600">
                        PHP
                    </a>
                </li>
                
                <li class="h-full">
                    <a href="#" class="py-auto h-full px-6 flex items-center bg-orange-600<?php if ($lang != "sql") { echo "/20"; } ?> hover:bg-orange-600">
                        SQL
                    </a>
                </li>
            </ul>
        </nav>
        <div class="flex justify-center bg-<?php if ($lang === "html") { echo "red-600"; } else if ($lang === "css") { echo "sky-600"; } else if ($lang === "js") { echo "amber-500"; } else if ($lang === "php") { echo "indigo-600"; } else if ($lang === "sql") { echo "orange-600"; } ?>">
            <h1 class="text-5xl font-bold text-white py-24"><?php echo "{$title}"; ?></h1>
        </div>
    </header>
</body>
</html>