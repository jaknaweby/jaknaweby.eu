<header>
    <nav class="w-full bg-stone-950 flex items-center justify-center h-12 relative">
        <a class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900 absolute top-0 left-0 cursor-pointer" id="hamburger"><img src="<?php echo "{$path}"; ?>/img/hamburger.png" alt="hamburger icon" class="h-1/2" id="hamburger-logo" style="transform: rotate(90deg);"></a>

        <ul class="flex text-white items-center text-xl h-full">
            <li class="h-full"><a href="../" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="<?php echo "{$path}"; ?>/img/home.png" alt="home icon" class="h-1/2"></a></li>

            <li class="h-full">
                <a <?php if ($lang != "html") { echo "href='../html'"; } else { echo "href='./'"; } ?> class="font-light py-auto h-full px-6 flex items-center <?php if ($lang != "html") { echo "bg-red-600/20"; } else { echo "bg-red-600"; } ?> hover:bg-red-600">
                    HTML
                </a>
            </li>

            <li class="h-full">
                <a <?php if ($lang != "css") { echo "href='../css'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center <?php if ($lang != "css") { echo "bg-sky-600/20"; } else { echo "bg-sky-600"; } ?> hover:bg-sky-600">
                    CSS
                </a>
            </li>

            <li class="h-full">
                <a <?php if ($lang != "js") { echo "href='../javascript'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center <?php if ($lang != "js") { echo "bg-yellow-600/20"; } else { echo "bg-yellow-600"; } ?> hover:bg-yellow-600">
                    JavaScript
                </a>
            </li>

            <li class="h-full">
                <a <?php if ($lang != "php") { echo "href='../php'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center <?php if ($lang != "php") { echo "bg-indigo-600/20"; } else { echo "bg-indigo-600"; } ?> hover:bg-indigo-600">
                    PHP
                </a>
            </li>

            <li class="h-full">
                <a <?php if ($lang != "sql") { echo "href='../sql'"; } else { echo "href='../'"; } ?> class="font-light py-auto h-full px-6 flex items-center <?php if ($lang != "sql") { echo "bg-orange-600/20"; } else { echo "bg-orange-600"; } ?> hover:bg-orange-600">
                    SQL
                </a>
            </li>
        </ul>

        <div class="absolute top-0 right-0 flex h-full">
            <?php
                session_start();

                try {
                    $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
                    $queryResult = mysqli_query($connection, "SELECT isAdmin FROM users WHERE username = '{$_SESSION["username"]}'");
        
                    if (mysqli_num_rows($queryResult) > 0) {
                        $fetchedResult = mysqli_fetch_row($queryResult);
                        
                        if ($fetchedResult[0] == 1) {
                            echo "<a href=\"../article.php\" class=\"h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900\"><img src=\"{$path}/img/article.png\" alt=\"article icon\" class=\"h-1/2\"></a>";
                        }
                    }
                } catch (Exception $e) {}
            ?>
            <a href="../login.php" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="<?php echo "{$path}"; ?>/img/user.png" alt="user icon" class="h-1/2"></a>
        </div>
    </nav>
    <div class="flex justify-center bg-<?php if ($lang === "html") { echo "red-600"; } else if ($lang === "css") { echo "sky-600"; } else if ($lang === "js") { echo "yellow-600"; } else if ($lang === "php") { echo "indigo-600"; } else if ($lang === "sql") { echo "orange-600"; } ?>">
        <h1 class="text-5xl font-bold text-white py-20"><?php echo "{$title}"; ?></h1>
    </div>

    <nav class="w-1/6 bg-stone-200 fixed top-12 bottom-0 shadow-2xl flex items-center flex-col" style="height: calc(100vh - 3rem);" id="articles">
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
            $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
            $articles = mysqli_query($connection, "SELECT title, url FROM articles WHERE language = '{$lang}'");

            foreach (mysqli_fetch_all($articles) as $row) {
                $itemTitle = $row[0];
                $itemUrl = $row[1];
                include("../../phpComponents/navItem.php");
            }
            ?>
        </ul>
    </nav>
</header>

<script src="../index.js"></script>