<div class="mt-32">
    <h2 class="text-4xl font-medium mb-3 pb-2 border-b-2
    <?php
    if ($lang == "html") { echo "border-red-500"; }
    else if ($lang == "css") { echo "border-sky-500"; }
    else if ($lang == "js") { echo "border-yellow-500"; }
    else if ($lang == "php") { echo "border-indigo-500"; }
    else if ($lang == "sql") { echo "border-orange-500"; }
    ?>
    ">
    <?php echo $title["title"]; ?>
    </h2>

    <?php
        foreach ($title["items"] as $line) {
            echo "<p class=\"font-light text-xl mb-2\">{$line}</p>";
        }
    ?>
</div>