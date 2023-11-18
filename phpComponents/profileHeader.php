<header>
    <nav class="w-full bg-stone-950 flex items-center justify-center h-12 relative">
        <ul class="flex text-white items-center text-xl h-full">
            <li class="h-full"><a href="index.php" class="h-full px-6 flex items-center bg-zinc-900<?php if ($pageType != "index") { echo "/20"; } ?> hover:bg-zinc-900"><img src="<?php echo $path ?>/img/home.png" alt="home icon" class="h-1/2"></a></li>
            <li class="h-full"><a href="html" class="font-light py-auto h-full px-6 flex items-center bg-red-600/20 hover:bg-red-600">HTML</a></li>
            <li class="h-full"><a href="css" class="font-light py-auto h-full px-6 flex items-center bg-sky-600/20 hover:bg-sky-600">CSS</a></li>
            <li class="h-full"><a href="javascript" class="font-light py-auto h-full px-6 flex items-center bg-yellow-600/20 hover:bg-yellow-600">JavaScript</a></li>
            <li class="h-full"><a href="php" class="font-light py-auto h-full px-6 flex items-center bg-indigo-600/20 hover:bg-indigo-600">PHP</a></li>
            <li class="h-full"><a href="sql" class="font-light py-auto h-full px-6 flex items-center bg-orange-600/20 hover:bg-orange-600">SQL</a></li>
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
                        echo "<a href=\"article.php\" class=\"h-full px-6 flex items-center bg-zinc-900";
                        if ($pageType != "article") {
                            echo "/20";
                        }
                        echo " hover:bg-zinc-900\"><img src=\"{$path}/img/article.png\" alt=\"article icon\" class=\"h-1/2\"></a>";
                    }
                }
            } catch (Exception $e) {}
            ?>

            <a href="login.php" class="h-full px-6 flex items-center bg-zinc-900<?php if ($pageType != "profile") { echo "/20"; } ?> hover:bg-zinc-900"><img src="<?php echo $path ?>/img/user.png" alt="user icon" class="h-1/2"></a>
        </div>
    </nav>
</header>